<head></head>
<body onload="initialize('blacklist.txt')">
	<center>
		<table>
			<tr><td align="right"><label>Cari Nama : </label></td><td><input type="text" id="name" name="name"></td></tr>
			<tr><td align="right"><label>Cari Nomor Telepon : </label></td><td><input type="text" id="phonum" name="phonum"></td></tr>
			<tr><td></td><td><input type="button" id="klik" value="Check" name="check" onclick="check_blacklist(document.getElementById('name').value,document.getElementById('phonum').value)"></td></tr>
		</table>
	</center>

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
			var rawFile = new XMLHttpRequest();
		    rawFile.onreadystatechange = function ()
		    {
		        if(rawFile.readyState === 4) // memastikan file bisa di parse
		        {
		            if(rawFile.status === 200 || rawFile.status == 0) // memastikan file yang dituju telah ditemukan
		            {
		                var allText = rawFile.responseText;
		                var input = allText.split("\n");
						var i = 0;
						var nama=[],phonum=[];
						while(i<input.length){
							var temp = input[i].split(" ");
		                	nama.push(temp[0]);
		                	phonum.push(temp[1].replace(/\s/g,''));
		                	i++;
		                }
	                	var hasname=binarySearch(nama,name);
	                	var hasnumb=binarySearch(phonum,phone_number);
	                	alert(hasname+" "+hasnumb);
	                	if(hasname != -1 && hasnumb != -1){
							alert("KETEMU!!!");
						}
						else{
							alert("Tidak Ketemu :(");
						}
					}
				}
			}
			rawFile.open("GET", "blacklist.txt");
			rawFile.send();
		}

		
		function binarySearch(arr, target) {
		    let left = 0;
		    let right = arr.length - 1;
		    while (left <= right) {
		        const mid = left + Math.floor((right - left) / 2);
		        if (arr[mid] === target) {
		            return mid;
		        }
		        if (arr[mid] < target) {
		            left = mid + 1;
		        } else {
		            right = mid - 1;
		        }
		    }
		    return -1;
		}
	</script>
</body>