window.onload = function(){
	document.getElementById("sendAcceptedData").disabled = true;
	document.getElementById("priceBtn").disabled = true;
	document.getElementById("parking_lots").addEventListener("change", enableCalc);
	
}

function enableCalc(){
	document.getElementById("priceBtn").disabled = false;
	document.getElementById("sendAcceptedData").disabled = true;
	document.getElementById("totalPricePlace").innerHTML = "";
	document.getElementById("priceBtn").addEventListener("click", calcPrice);
}

function calcPrice(){
	var dataFromWeb = document.getElementById("priceForHour").value;
	var pricesForHour = dataFromWeb.split(",");
	dataFromWeb = document.getElementById("priceForDay").value;
	var pricesForDay = dataFromWeb.split(",");
	dataFromWeb = document.getElementById("priceForWeek").value;
	var pricesForWeek = dataFromWeb.split(",");
	//console.log(pricesForDay);
	var parkingSpace = parseInt(document.getElementById("parking_lots").value) - 1;
	var totalPrice = parseInt(document.getElementById("quantity3").value) * parseFloat(pricesForHour[parkingSpace]) + parseInt(document.getElementById("quantity2").value) * parseFloat(pricesForDay[parkingSpace]) + parseInt(document.getElementById("quantity1").value) * parseFloat(pricesForWeek[parkingSpace]);
	totalPrice = Math.round(totalPrice * 10) / 10;
	document.getElementById("totalPricePlace").innerHTML = totalPrice + " eurot";
	document.getElementById("totalPrice").value = totalPrice;
	document.getElementById("sendAcceptedData").disabled = false;
	console.log(totalPrice);
	console.log("Hind: " + document.getElementById("totalPrice").value);
}