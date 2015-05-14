<div class = "contentwrapper">
    <div class = "content">
<script>
		$(document).ready(function () {				
			$("#upload_image").imageUpload("upl/run", {
				uploadButtonText: "Зарузить",
				previewImageSize: 100,
				onSuccess: function (response) {
					alert(response);
				}
			});
		});
	</script>

	<div id="upload_image">
	</div>
	</div>
</div>