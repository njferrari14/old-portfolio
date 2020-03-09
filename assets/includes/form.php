<div id="contact" class="grid-container-lg contact box">
	<h2>Contact Me!</h2>
	<form method="post" class="form grid-container">
		<div class="fields">
			<div class="field">
				<label for="name">Name:
					<?php if(in_array('name', $missing)) { ?>
						<span class="warning">Please enter your name</span>
					<?php } ?>
				</label>
				<input type="text" id="name" name="name" placeholder="Armin Tamzarian"
					<?php if ($missing || $errors) {
						echo 'value="' . htmlentities($name) . '"';
					} ?>>
			</div>
			<div class="field">
				<label for="email">Email:
					<?php if(in_array('email', $missing)) { ?>
						<span class="warning">Please enter your email</span>
					<?php } ?>
				</label>
				<input type="text" id="email" name="email" placeholder="seymour@steamedhams.com"
					<?php if ($missing || $errors) {
						echo 'value="' . htmlentities($email) . '"';
					} ?>>
			</div>
			<div class="field">
				<label for="comments">Comments:
					<?php if(in_array('comments', $missing)) { ?>
						<span class="warning">Please enter a message</span>
					<?php } ?>
				</label>
				<textarea type="text" id="comments" name="comments" placeholder="Type your message here...">
					<?php if ($missing || $errors) {
						echo 'value="' . htmlentities($comments) . '"';
					} ?></textarea>
			</div>
		</div>
		<input class="btn" type="submit" name="submit" value="Contact">
	</form>
</div>