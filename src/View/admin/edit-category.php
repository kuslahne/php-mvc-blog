<?php $this->layout('admin::admin-layout', ['title' => 'Admin - Edit Category', 'page' => $page]) ?>
<?php //exit; ?>
<h2>Edit Category</h2>
<?php 
	//var_dump($flash);
	if(isset($flash)){
		var_dump($flash->display());
	}
	
	if(isset($formErrors)){
		foreach ($formErrors as $key => $formError) {
			//var_dump($key);
			//var_dump($formError);
		}
	}


//exit; ?>
<form action="/admin/categories/<?= $this->e($category->id)?>" id="categoryForm" method="POST">
  <?php if(isset($flashs)): foreach ($flash as $fl) {?>
    <div class="mb-3">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">

        <?php var_dump($fl); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    </div>
  <?php } endif; ?>
  <?php if(isset($result)): ?>
    <div class="mb-3">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->e($result)?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    </div>
  <?php endif; ?>
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?= $this->e($category->name) ?>">
    <div id="nameHelp" class="form-text">You cannot change the name</div>
  </div>
  <div class="mb-3">
    <div>
		<label for="description" class="form-label">Description</label>
		<textarea id="description" name="description" class="form-control <?= isset($formErrors['description']) ? 'is-invalid' : ''?>" aria-describedby="descriptionHelp" required><?= $this->e($category->description) ?></textarea>
		<div id="descriptionlHelp" class="form-text">Your content must be at least 50 characters long</div>
		<div id="validationServerContent" class="invalid-feedback">
		  <?= $this->e($formErrors['description'] ?? '')?>
		</div>
    </div>
  </div>
  <div class="mb-3">
    <div>
		<label for="meta_description" class="form-label">Meta tag Description</label>
		<textarea id="content" name="meta_description" class="form-control <?= isset($formErrors['meta_description']) ? 'is-invalid' : ''?>" aria-describedby="metaDescriptionHelp"></textarea>
		<div id="metaDescriptionlHelp" class="form-text">Your content must be at least 10 characters long</div>
		<div id="validationServerContent" class="invalid-feedback">
		  <?= $this->e($formErrors['meta_description'] ?? '')?>
		</div>
    </div>
  </div>
  <button type="button" class="btn btn-secondary" id="cancel">Cancel</button>
  <button type="submit" class="btn btn-primary">Save</button>
</form>

<?php $this->push('js') ?>
<script type="text/javascript">
	window.onload = function() {
		var cancelButton = document.getElementById('cancel')
			cancelButton.addEventListener('click', function(e) {
			window.location.href = '/admin/categories'
		})
		
		//const form = document.getElementById("categoryForm");
		//form.addEventListener("submit", (e) => {
		  //e.preventDefault();

		  //const formData = new FormData(form);

		  //fetch("/admin/categories/<?= $this->e($category->id)?>", {
			//method: "POST",
			//body: formData,
		  //})
			//.then( function(response) {
				//console.log(response);
				//console.log(response.ok);
				//if (!response.ok){
					////window.location.href = '/admin/categories/<?= $this->e($category->id)?>';
				//}
				////window.location.href = '/admin/categories/<?= $this->e($category->id)?>';
				////window.location.href = '/admin/categories';
			//})
			//.catch((error) => console.error(error));
		//});
	};
</script>
<?php $this->end() ?>
