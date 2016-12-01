<?php 

use Cake\Core\Configure;

$this->assign('title', __('Login')); 

?>
<section>
	<div class="container">
		
		<div class="row">

			<div class="col-md-6 col-md-offset-3">

				<!-- ALERT -->
				<?= $this->Flash->render('auth') ?>
				<?= ''//$this->Flash->render() ?>

				<div class="box-static box-border-top padding-30">
					<div class="box-title margin-bottom-30">
						<h2 class="size-20"><?= __('Sign in') ?></h2>
					</div>
					<?= $this->Form->create() ?>
						<div class="clearfix">
							<?= $this->Form->input('username', ['label' => false, 'required' => true, 'placeholder' => __('Username')]) ?>
       	 					<?= $this->Form->input('password', ['label' => false, 'required' => true, 'placeholder' => __('Password')]) ?>
						</div>
						<?php
						if (Configure::read('Users.RememberMe.active')) {
				            echo $this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
				                'type' => 'checkbox',
				                'checked' => 'checked'
				            ]);
				        }
				        ?>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">                           
								<div class="form-tip pt-20">
									<?= $this->Html->link(__('Forgot Password'), ['action' => 'requestResetPassword']) ?>
								</div>	
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 text-right">
								 <?= $this->Form->button(__d('CakeDC/Users', 'Login'), ['class' => 'btn-primary']); ?>
							</div>
						</div>
					<?= $this->Form->end() ?>
				</div>

				<?php if (Configure::read('Users.Registration.active')): ?>
				<div class="margin-top-30 text-center">
					<?= $this->Html->link(__('Create Account'), ['action' => 'register']) ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>