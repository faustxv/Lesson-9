<div class = "row"><h1><span class="label label-warning">Delete article: <?php print $data['title']; ?></span></h1><br></div>
	<form class="form-horizontal" action="/article/delete/?id=<?php print $_GET['id'];?>" method="POST">
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" name="del" class="btn btn-default text-uppercase btn-danger">Delete</button>
				<a href="/" class="btn btn-success text-uppercase">Back</a>
			</div>
		</div>
	</form>
</div>
