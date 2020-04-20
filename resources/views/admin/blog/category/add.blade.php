<div style="bottom: 60px; right: 19px;" class="fixed-action-btn direction-top">
	<a class="btn-floating btn-large gradient-45deg-purple-deep-purple gradient-shadow modal-trigger" href="#modalAddArticleCategory"><i class="material-icons">add</i></a>
</div>

<div id="modalAddArticleCategory" class="modal border-radius-6" aria-preventScrolling="true">
	<div class="modal-content">
		<h5 class="mt-0">
			Add New Category
		</h5>
		<form class="formValidate" id="addValidate" method="POST" action="{{ route('admin.artcategory.store') }}">
			@csrf
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<i class="material-icons prefix">title</i>
					<input id="name" type="text" name="name" class="validate" required>
					<label for="name">Name</label>
					<small class="errorTxtName"></small>
				</div>
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col s12 m12 l12">
						<a href="#!" class="modal-action modal-close waves-effect waves-dark btn grey lighten-2" style="color: #555">Cancel
						</a>
	                  	<button class="btn deep-purple waves-effect waves-light" type="submit" name="action">Add
	                  	</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>