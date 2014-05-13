<!-- Marker to show that footer is being displayed.  Delete when put into production.  -->

    <script src="<?php echo BASE_URL?>/application/plugins/tinyeditor/tiny.editor.packed.js"></script>

    <script>
			var editor = new TINY.editor.edit('editor', {
				id: 'tinyeditor',
				width: 584,
				height: 175,
				cssclass: 'tinyeditor',
				controlclass: 'tinyeditor-control',
				rowclass: 'tinyeditor-header',
				dividerclass: 'tinyeditor-divider',
				controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
					'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
					'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
					'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|'],
				footer: true,
				fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
				xhtml: true,
				cssfile: 'custom.css',
				bodyid: 'editor',
				footerclass: 'tinyeditor-footer',
				toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
				resize: {cssclass: 'resize'}
			});


	</script>

   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo BASE_URL?>/views/js/jquery.js"></script>
<!-- <script src="<?php echo BASE_URL?>/views/js/bootstrap.min.js"></script>  -->
    <script src="//startbootstrap.com/templates/grayscale/js/grayscale.js"></script>
	<!-- <script src="//startbootstrap.com/templates/freelancer/js/bootstrap.min.js"></script> -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  </body>
</html>

