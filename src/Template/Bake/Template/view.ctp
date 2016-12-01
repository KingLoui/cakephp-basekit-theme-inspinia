<%
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>
<?php $this->assign('title', h($<%= $singularVar %>-><%= $displayField %>)); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <table class="table">
            <% if ($groupedFields['string']) : %>
            <% foreach ($groupedFields['string'] as $field) : %>
            <% if (isset($associationFields[$field])) :
                        $details = $associationFields[$field];
            %>
                    <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize($details['property']) %>') ?></th>
                        <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                    </tr>
            <% else : %>
                    <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                        <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                    </tr>
            <% endif; %>
            <% endforeach; %>
            <% endif; %>
            <% if ($associations['HasOne']) : %>
                <%- foreach ($associations['HasOne'] as $alias => $details) : %>
                    <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>') ?></th>
                        <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                    </tr>
                <%- endforeach; %>
            <% endif; %>
            <% if ($groupedFields['number']) : %>
            <% foreach ($groupedFields['number'] as $field) : %>
                    <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                        <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
                    </tr>
            <% endforeach; %>
            <% endif; %>
            <% if ($groupedFields['date']) : %>
            <% foreach ($groupedFields['date'] as $field) : %>
                    <tr>
                        <th scope="row"><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></th>
                        <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                    </tr>
            <% endforeach; %>
            <% endif; %>
            <% if ($groupedFields['boolean']) : %>
            <% foreach ($groupedFields['boolean'] as $field) : %>
                    <tr>
                        <th scope="row"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                        <td><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></td>
                    </tr>
            <% endforeach; %>
            <% endif; %>
                </table>

            <% if ($groupedFields['text']) : %>
            <% foreach ($groupedFields['text'] as $field) : %>
                <div class="row">
                    <h4><?= __('<%= Inflector::humanize($field) %>') ?></h4>
                    <?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)); ?>
                </div>
            <% endforeach; %>
            <% endif; %>

            </div>
        </div>
    </div>
</div>
    
<%
$relations = $associations['HasMany'] + $associations['BelongsToMany'];
foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize(Inflector::underscore($details['controller']));
    %>
    <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?= __('Related <%= $otherPluralHumanName %>') ?></h5>
                    </div>
                    <div class="ibox-content">
                        
                        <table class="table table-striped">
                            <tr>
                <% foreach ($details['fields'] as $field): %>
                                <th scope="col"><?= __('<%= Inflector::humanize($field) %>') ?></th>
                <% endforeach; %>
                                <th scope="col"></th>
                            </tr>
                            <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
                            <tr>
                            <%- foreach ($details['fields'] as $field): %>
                                <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
                            <%- endforeach; %>
                            <%- $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
                                <td class="actions dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-cog"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right animated fadeInRight m-t-xs">
                                        <li><?= $this->Html->link(__('View'), ['controller' => '<%= $details['controller'] %>', 'action' => 'view', <%= $otherPk %>]) ?></li>
                                        <li><?= $this->Html->link(__('Edit'), ['controller' => '<%= $details['controller'] %>', 'action' => 'edit', <%= $otherPk %>]) ?></li>
                                        <li><?= $this->Form->postLink(__('Delete'), ['controller' => '<%= $details['controller'] %>', 'action' => 'delete', <%= $otherPk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $otherPk %>)]) ?></li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<% endforeach; %>