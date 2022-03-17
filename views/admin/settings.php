<?php
/**
 * Settings.
 *
 * @package PodInbox/Views/Admin
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//phpcs:disable VariableAnalysis
// There are "undefined" variables here because they're defined in the code that includes this file as a template.
?>

<div class="podinbox-plugin-container">
	<!-- Include header section -->
	<?php require_once 'header/header.php'; ?>

	<div class="podinbox-body">
		<div class="podinbox-body__inside-container">

			<!-- Include body info section -->
			<?php require_once 'body/info.php'; ?>

			<div class="podinbox-body__steps-container">
				<div class="podinbox-body__steps">
					<!-- Include step one section -->
					<?php require_once 'body/step-one.php'; ?>

					<!-- Include step two section -->
					<?php require_once 'body/step-two.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>
