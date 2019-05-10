
<head></head>
<body onload="WriteFile()">
		<label>Order : </label><input id="order" name="order" type="text">
		<input type="button" id="pesan" name="pesan" Value="Pesan" onclick="pencet()" download="pesan.txt">
	</br>
	<div id="hasil"></div>

	<script type="text/javascript">
		function pencet(){
			var inputan = document.getElementById('order').value;
			var makan="", minum="";
			if(inputan.substring(0,5)=="order"){
				var temp = inputan.substring(8,inputan.length-2);
				var spliu= temp.split(",");
				makan = spliu[0];
				minum = spliu[1];
				document.getElementById('hasil').textContent = spliu[0].substring(spliu[1].length-1);

			}
		}
		
		function WriteFile(){
			alert("test");
			var fh = fopen("c:\\xampp\\htdocs\\Moving_Bites_Ex\\makan.txt", 3); // Open the file for writing
			//alert(fh);
			if(fh!=-1){ // If the file has been successfully opened
				var str = "Some text goes here...";
				fwrite(fh, str); // Write the string to a file
				fclose(fh); // Close the file
			}
		}
	</script>
</body>