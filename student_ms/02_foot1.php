</div>
		</div>
	</body>
</html>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
	function yyy(){
		$.get(
			"yyy.php",
			function(data){
				$("#code_btn").html(data);
			},
			"text"
		)
	}
	yyy();
	$("#code_btn").bind("click",function(){
		yyy();
	})
			
</script>
