<?php
/**
 * Nice InfoBoxes.
 *
 * About page content for Admin UI.
 *
 * @package Nice_Infoboxes
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

?>
	<?php if ( $ui instanceof Nice_Infoboxes_Admin_UI ) : ?>
		<div class="page-content full-width clearfix">

			<div class="content about-wrap">

				<div class="features box-container">

					<h2>Plugin Features</h2>

					<div class="description">
						<p>Nice InfoBoxes displays important information to your visitors in a
							clean, responsive and beautiful way. You can show your infoboxes
							using a shortcode or template tag.</p>
					</div>

					<div class="box first">
						<h4>Comprehensive settings page</h4>

						<p>Define how your infoboxes are displayed without having to code with our intuitive
							settings page.</p>
					</div>

					<div class="box">
						<h4>Mobile friendly</h4>

						<p>Nice InfoBoxes includes a responsive layout, and gives you the
							possibility to define the number of columns you want to show.</p>
					</div>

					<div class="box">
						<h4>Theme compatibility</h4>

						<p>This plugin works right out of the box with any theme, but it looks even
							better with our <a href="https://nicethemes.com/themes/" target="_blank">premium themes</a>,
							so you may want to take a look at them :)</p>
					</div>

					<div class="box first">
						<h4>Shortcode</h4>

						<p>You can use the <code>[infoboxes]</code> shortcode to show your
							infoboxes anywhere you want.</p>
					</div>

					<div class="box">
						<h4>Template tag</h4>

						<p>Use our <code>nice_infoboxes()</code> PHP function to show infoboxes anywhere you want.</p>
					</div>
				</div>

				<div class="help box-container">
					<h2>Need Help?</h2>

					<div class="box first">

						<h4>Extensive documentation</h4>

						<p>If you have any doubt about how to configure any part of the plugin,
							you can read our
							<a href="https://nicethemes.com/documentation/infoboxes/">documentation page</a>
							to sort it out.
						</p>
					</div>

					<div class="box">

						<h4>Great support</h4>

						<p>We work hard to provide the best support we can. If you find a
							problem or have a question, you can post it in our
							<a href="https://nicethemes.com/support/support-forum/">support forums</a>.
						</p>
					</div>

					<div class="box">
						<h4>Developer friendly</h4>

						<p><strong>Nice InfoBoxes</strong> is developed following the
							<a href="http://codex.wordpress.org/WordPress_Coding_Standards">WordPress Coding
								Standards</a> and includes a huge set of hooks, so you can customize it in any way you need.</p>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
