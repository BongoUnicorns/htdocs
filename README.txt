<form action="commandToBeRun" method="post">
	Run Command: <input type="text" id="commandToBeRun" name="commandToBeRun"><br>
	<input type="submit">
	</form>



	<script>
	function enterKeyListener(){
		document.getElementById("commandToBeRun").addEventListener("keydown", function(e){
			if (!e) {var e = window.event;}
			e.preventDefault();

			if (e.keyCode == 13) { submitFunction(); }
		},	false);}
	</script>