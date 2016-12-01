<section>
	<div class="container">
		
		<div class="row">

			<div class="col-md-6 col-md-offset-3">

				<!-- ALERT -->
				<?= $this->Flash->render('auth') ?>
				<?= $this->Flash->render() ?>

				<div class="box-static box-border-top padding-30">
					<div class="box-title margin-bottom-30">
						<h2 class="size-20"><?= __('Reset Password') ?></h2>
					</div>
					<?= $this->Form->create('User') ?>
				    <fieldset>
				      	<h4><?= __d('CakeDC/Users', 'Please enter your email to reset your password') ?></h4>
				        <?= $this->Form->input('reference', [
								'templates' => [
        							'inputContainer' => '{{content}}'
    							],
    							'label' => false,
    							'placeholder' => __('Email')])
    						?>
				    </fieldset>
				    <?= $this->Form->button(__d('CakeDC/Users', 'Reset'), ['class' => 'btn-primary']); ?>
				    <?= $this->Form->end() ?>
				</div>
			</div>
		</div>
	</div>
</section>