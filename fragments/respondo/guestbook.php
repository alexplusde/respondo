<?php

use Respondo\Entry;

/** @var rex_fragment $this */

$collection = $this->getVar('collection', Entry::getComments());

?>
<div class="container mt-5 mb-5">
	<div class="row height d-flex justify-content-center align-items-center">
		<div class="col-md-7">
			<div class="card">
				<div class="p-3">
					<h6>
						<?= rex_i18n::msg('respondo.guestbook.headline') ?>
					</h6>
				</div>

				<?php

/* Sub-Fragment comment-form.php */
$this->setVar('form_ytemplate', 'bootstrap');
echo $this->subfragment('respondo/guestbook-form.php');

foreach ($collection as $entry) {
    $this->setVar('entry', $entry, false);
    echo $this->subfragment('respondo/guestbook-entry.php');
}

?>

			</div>
		</div>
	</div>
</div>
