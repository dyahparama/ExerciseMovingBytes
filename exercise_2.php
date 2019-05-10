 	
<head></head>
<body onload="WriteFile()">
	<center>
		<table>
			<tr><td><label>Order : </label></td><td><input id="order" name="order" type="text"></td></tr>
			<tr><td></td><td><input type="button" id="pesan" name="pesan" value="Pesan" onclick="pencet()"></td></tr>
		</table>
	</center>
		<input type="hidden" id="dataMakan" value="0">
		<input type="hidden" id="antriMakan" value="0">
		<input type="hidden" id="dataMinum" value="0">
		<input type="hidden" id="antriMinum" value="0">
	</br>
	<div id="hasil"></div>

	<script type="text/javascript">
		function pencet(){
			var inputan = document.getElementById('order').value;
			var makan="", minum="";
			var namaMakan=["Nasi Goreng","Nasi Goreng Seafood", "Nasi Goreng Special"];
			var namaMinum=["Teh Tawar","Teh Hangat","Teh Tarik"];
			if(inputan.substring(0,5)=="order"){
				var temp = inputan.substring(8,inputan.length-2).replace(/\s/g,''); //memotong string hingga cuma sisa pesanan dan hilangkan spasi
				if(temp.includes(",") == true){
					var spliu= temp.split(",");
					var MakNam=spliu[0].split(":")[0];
					var MinNam=spliu[1].split(":")[0];
					makan = spliu[0].substring(spliu[0].length-1);
					minum = spliu[1].substring(spliu[1].length-1);
					var alerto = 0 //buat alert input semua tanpa intrupsi
					var alerto1 = null;
					var jummak= parseInt(document.getElementById('dataMakan').value,10) + parseInt(makan);
					var jummin= parseInt(document.getElementById('dataMinum').value,10) + parseInt(minum);
					//Nyimpan Data Makan
					if(parseInt(document.getElementById('dataMakan').value,10) != 0)
					{
						if(jummak > 5){
							document.getElementById('dataMakan').value = 5;
							document.getElementById('antriMakan').value = jummak - 5;
							alerto1=true;
						}
						else{
							document.getElementById('dataMakan').value = jummak;
							alerto++;
						}
					}
					else{
						document.getElementById('dataMakan').value = makan;
						alerto++;
					}
					//Nyimpan Data Minum
					if(parseInt(document.getElementById('dataMinum').value,10) != 0)
					{
						if(jummin > 3){
							document.getElementById('dataMinum').value = 3;
							document.getElementById('antriMinum').value = jummin - 3;
							alerto1=false;
						}
						else{
							document.getElementById('dataMinum').value = jummin;
							alerto++;
						}
					}
					else{
						document.getElementById('dataMinum').value = minum;
						alerto++;
					}

					if(alerto==2){
						alert("Pesanan anda berhasil, silahkan ditunggu.");
					}
					if(alerto1==true){
						alert("Pesanan anda berhasil, namun "+(jummak-5)+" "+MakNam+" yang anda pesan masih dalam antrian, harap menunggu.");
					}
					else if(alerto1==false){
						alert("Pesanan anda berhasil, namun "+(jummin-3)+" "+MinNam+" yang anda pesan masih dalam antrian, harap menunggu.");
					}
				}
				else{ //jika data cuma 1
					var spliu = temp.split(":");
					var i=0;
					var stat=true;

					while(i<3){
						if(namaMakan[i]== spliu[0]){ // cek data tersebut berupa makanan
							break;
						}
						if(namaMinum[i]==spliu[0]){ //  cek input tersebut berupa minuman
							stat=false;
							break;
						}
						i++;
					}
					if(stat==true){
						makan = spliu[1];
						//Nyimpan Data Makan
						if(parseInt(document.getElementById('dataMakan').value,10) != 0)
						{
							var jummak= parseInt(document.getElementById('dataMakan').value,10) + parseInt(makan);
							if(jummak > 5){
								document.getElementById('dataMakan').value = 5;
								document.getElementById('antriMakan').value = jummak - 5;
								alert("Pesanan anda berhasil, namun "+(jummak-5)+" "+spliu[0]+" yang anda pesan masih dalam antrian, harap menunggu.");
							}
							else{
								document.getElementById('dataMakan').value = jummak;
								alert("Pesanan anda berhasil, silahkan ditunggu.");
							}
						}
						else{
							document.getElementById('dataMakan').value = makan;
							alert("Pesanan anda berhasil, silahkan ditunggu.");
						}
					}
					else{
						minum = spliu[1];
						//Nyimpan Data Minum
						if(parseInt(document.getElementById('dataMinum').value,10) != 0)
						{
							var jummin= parseInt(document.getElementById('dataMinum').value,10) + parseInt(minum);
							if(jummin > 3){
								document.getElementById('dataMinum').value = 3;
								document.getElementById('antriMinum').value = jummin - 3;
								alert("Pesanan anda berhasil, namun "+(jummin-3)+" "+spliu[0]+" yang anda pesan masih dalam antrian, harap menunggu.");
							}
							else{
								document.getElementById('dataMinum').value = jummin;
								alert("Pesanan anda berhasil, silahkan ditunggu.");
							}
						}
						else{ 
							document.getElementById('dataMinum').value = minum;
							alert("Pesanan anda berhasil, silahkan ditunggu.");
						}
					}					
				}
			}
			else if(inputan.substring(0,5)=="clear"){
				var cleare=inputan.replace(/\s/g,''); //menghilangkan spasi
				if(inputan.substring(5,12)=="Makanan"){ // jika mau clear makanan
					if(document.getElementById('dataMakan').value != 0){ //  jika masih ada makanan yang dikerjakan
						var tampa = parseInt(document.getElementById('dataMakan').value) - parseInt(cleare.substring(18,19));
						if(tampa<0){
							document.getElementById('dataMakan').value = Math.abs(tampa);
							var tambah = parseInt(document.getElementById('antriMakan').value) - Math.abs(tampa);

						}
						else if(tampa==0){
							if(parseInt(document.getElementById('antriMakan').value) > 3){
								document.getElementById('dataMakan').value = 3;
								document.getElementById('antriMakan').value = parseInt(document.getElementById('antriMakan').value) - 3;
							}
							else if(parseInt(document.getElementById('antriMakan').value) <= 3 && parseInt(document.getElementById('antriMakan').value) > 0 ){
								document.getElementById('dataMakan').value = parseInt(document.getElementById('antriMakan').value);
								document.getElementById('antriMakan').value = 0;
							}
							else{
								document.getElementById('dataMakan').value = 0;
							}
						}
						else{
							document.getElementById('dataMakan').value = tampa;
						}
						var i=0;
						while(i<parseInt(cleare.substring(18,19))){
							alert("Makanan telah disajikan, mengambil satu makanan dalam antrian untuk dibuatkan.");
							i++;
						}
					}
				}
				else{
					if(document.getElementById('dataMinum').value != 0){ //  jika masi ada minum yang dikerjakan
						var tampa = parseInt(document.getElementById('dataMinum').value) - parseInt(cleare.substring(18,19));
						if(tampa<0){
							document.getElementById('dataMinum').value = Math.abs(tampa);
							var tambah = parseInt(document.getElementById('antriMinum').value) - Math.abs(tampa);
							document.getElementById('antriMinum').value = tambah;
						}
						else if(tampa==0){
							if(parseInt(document.getElementById('antriMinum').value) > 3){
								document.getElementById('dataMinum').value = 3;
								document.getElementById('antriMinum').value = parseInt(document.getElementById('antriMinum').value) - 3;
							}
							else if(parseInt(document.getElementById('antriMinum').value) <= 3 && parseInt(document.getElementById('antriMinum').value) > 0 ){
								document.getElementById('dataMinum').value = parseInt(document.getElementById('antriMinum').value);
								document.getElementById('antriMinum').value = 0;
							}
							else{
								document.getElementById('dataMinum').value = 0;
							}
						}
						else{
							document.getElementById('dataMinum').value = tampa;
						}
						var i=0;
						while(i<parseInt(cleare.substring(18,19))){
							alert("Minuman telah disajikan, mengambil satu minuman dalam antrian untuk dibuatkan.");
							i++;
						}
					}
				}
			}
		}
	</script>
</body>