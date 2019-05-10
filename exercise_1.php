<head></head>
<body onload="initialize('blacklist.txt')">
	<p id="tex"></p>
	<p id="cek"></p>
	<input type="text" id="name" name="name">
	<input type="text" id="phonum" name="phonum">
	<input type="button" id="klik" value="Check" name="check" onclick="check_blacklist(document.getElementById('name').value,document.getElementById('phonum').value)">

	<script type="text/javascript">
		function initialize(blacklist){
			var rawFile = new XMLHttpRequest();
		    rawFile.onreadystatechange = function ()
		    {
		        if(rawFile.readyState === 4) // memastikan file bisa di parse
		        {
		            if(rawFile.status === 200 || rawFile.status == 0) // memastikan file yang dituju telah ditemukan
		            {
		                var allText = rawFile.responseText;
		                document.getElementById("tex").innerHTML=allText;
		            }
		        }
		    }
		    rawFile.open("GET", blacklist);
		    rawFile.send();
		}
		
		function check_blacklist(name,phone_number){
			var input = document.getElementById("tex").innerHTML.split("\n");
			var i = 0;
			while(i<input.length){
				var temp = input[i].split(" ");
				var bool = Boolean(temp[0] == name && temp[1] == phone_number);
				alert(bool);
				if(bool == "true"){
					return bool;
					break;
				}
				i++;
			}
		}
	</script>
</body>