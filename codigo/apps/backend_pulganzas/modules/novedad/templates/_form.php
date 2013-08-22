<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>



<div class="row">
	<div class="span5">
		<form class="form-horizontal"
			action="<?php echo url_for('novedad/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>"
			method="post"
			<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
			<?php if (!$form->getObject()->isNew()): ?>
			<input type="hidden" name="sf_method" value="put" />
			<?php endif; ?>
			<?php echo $form->renderHiddenFields()?>


			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"titulo"));?>
			<?php include_partial("global/simpleFormField",array("form"=>$form,"field"=>"texto"));?>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Guardar</button>
					<a href="<?php echo url_for('novedad/index') ?>" class="btn">Volver</a>

				</div>
			</div>
		</form>
	</div>



<form action="<?php echo url_for('novedad/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('novedad/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'novedad/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
