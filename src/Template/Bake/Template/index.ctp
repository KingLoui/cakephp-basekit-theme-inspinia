<%
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}

if (!empty($indexColumns)) {
    $fields = $fields->take($indexColumns);
}

%>
<?php $this->assign('title', __('<%= $pluralHumanName %>')); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
            <% foreach ($fields as $field): %>
                            <th scope="col"><?= $this->Paginator->sort('<%= $field %>') ?></th>
            <% endforeach; %>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
                        <tr>
            <%        foreach ($fields as $field) {
                        $isKey = false;
                        if (!empty($associations['BelongsTo'])) {
                            foreach ($associations['BelongsTo'] as $alias => $details) {
                                if ($field === $details['foreignKey']) {
                                    $isKey = true;
            %>
                            <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
            <%
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
            %>
                            <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
            <%
                            } else {
            %>
                            <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
            <%
                            }
                        }
                    }

                    $pk = '$' . $singularVar . '->' . $primaryKey[0];
            %>
                            <td class="actions dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-cog"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right animated fadeInRight m-t-xs">
                                    <li><?= $this->Html->link(__('View'), ['action' => 'view', <%= $pk %>]) ?></li>
                                    <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', <%= $pk %>]) ?></li>
                                    <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', <%= $pk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?></li>
                                </ul>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator text-center">
                    <ul class="pagination btn-group">
                        <?= $this->Paginator->numbers(['prev' => true, 'next' => true]) ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


