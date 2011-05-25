<?php echo anchor('/user/signup', 'Sign Up'); ?> | <a href="#login" class="popup">Login</a>
					<div class="hidden" id="login">
						<?php
							$this->load->view('login_form');
						?>
					</div>