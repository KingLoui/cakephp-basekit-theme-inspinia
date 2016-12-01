<?php
use Cake\Core\Configure;
?>
<section>
	<div class="container">

		<div class="row">

			<!-- LOGIN -->
			<div class="col-md-6 col-sm-6">

				<!-- ALERT -->
				<?= $this->Flash->render('auth') ?>
    
				<!-- register form -->
				<?= $this->Form->create($user, ['class' => ['nomargin', 'sky-form', 'boxed']]); ?>
					<header>
						<i class="fa fa-users"></i> Register
					</header>

					<fieldset class="nomargin">
						<label class="input margin-bottom-10">
							<i class="ico-append fa fa-user"></i>
							<?= $this->Form->input('username', [
								'templates' => [
        							'inputContainer' => '{{content}}'
    							],
    							'label' => false,
    							'placeholder' => __('Username')])
    						?>
							<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
						</label>

						<label class="input margin-bottom-10">
							<i class="ico-append fa fa-envelope"></i>
							<?= $this->Form->input('password_confirm', [
								'templates' => [
        							'inputContainer' => '{{content}}'
    							],
    							'label' => false,
    							'placeholder' => __('Email address')])
    						?>
							<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
						</label>
					
						<label class="input margin-bottom-10">
							<i class="ico-append fa fa-lock"></i>
							<?= $this->Form->input('password', [
								'templates' => [
        							'inputContainer' => '{{content}}'
    							],
    							'label' => false, 
    							'placeholder' => __('Password')])
    						?>
							<b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
						</label>
					
						<label class="input margin-bottom-10">
							<i class="ico-append fa fa-lock"></i>
							<?= $this->Form->input('password_confirm', [
								'templates' => [
        							'inputContainer' => '{{content}}'
    							],
    							'label' => false,
    							'type' => 'password', 
    							'placeholder' => __('Confirm password')])
    						?>
							<b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
						</label>

						<div class="row margin-bottom-10">
							<div class="col-md-6">
								<?= $this->Form->input('first_name', ['label' => false, 'placeholder' => __('First name')]) ?>
							</div>
							<div class="col col-md-6">
								<?= $this->Form->input('last_name', ['label' => false, 'placeholder' => __('Last name')]) ?>
							</div>
						</div>
						
						<div class="margin-top-30">
							<?php
							if (Configure::read('Users.Tos.required')) {
					            echo $this->Form->input('tos', ['type' => 'checkbox', 'label' => 'I agree to the '.'<a href="#" data-toggle="modal" data-target="#termsModal">Terms of Service</a>','escape' => False, 'required' => true]);
					        }
					        if (Configure::read('Users.reCaptcha.registration')) {
					            echo $this->User->addReCaptcha();
					        }
					        ?>
						</div>
					</fieldset>

					<div class="row margin-bottom-20">
						<div class="col-md-12">
							<?= $this->Form->button(__d('KingLoui/BaseKitThemeTwentySixteen', '<i class="fa fa-check"></i>'.'REGISTER'), ['class' => 'btn-primary', 'escape' => false]) ?>
						</div>
					</div>

				<?= $this->Form->end() ?>
				<!-- /register form -->

			</div>
			<!-- /LOGIN -->

			<!-- SOCIAL LOGIN -->
			<div class="col-md-6 col-sm-6">
				<form action="#" method="post" class="sky-form boxed">

					<header class="size-18 margin-bottom-20">
						Register using your favourite social network
					</header>
					
					<fieldset class="nomargin">

						<div class="row">
						
							<div class="col-md-8 col-md-offset-2">

								<a class="btn btn-block btn-social btn-facebook margin-bottom-10">
									<i class="fa fa-facebook"></i> Sign up with Facebook
								</a>

								<a class="btn btn-block btn-social btn-twitter margin-bottom-10">
									<i class="fa fa-twitter"></i> Sign up with Twitter
								</a>

								<a class="btn btn-block btn-social btn-google margin-bottom-10">
									<i class="fa fa-google-plus"></i> Sign up with Google
								</a>
						
							</div>
						</div>

					</fieldset>

					<footer>
						Already have an account? <strong><?= $this->Html->link(__('Back to login!'), ['action' => 'login']) ?></strong>
					</footer>

				</form>
			</div>
			<!-- /SOCIAL LOGIN -->
		</div>
	</div>
</section>