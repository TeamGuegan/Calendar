//Gerer dernier et premier mois

var months = ["Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Jui", "Aou", "Sep", "Oct", "Nov", "Dec"];

function displayAllMonths() {
	$(function() {
		$("#month").click(function() {
			$("#month").hide();
			$("#AllMonth").html(function() {
				var string = "";
				string += "<ul id=\"popupMonLi\">";
				for (var s in months) {
					string += "<li class=\"changeMonth\" onclick=\"changeMonth()\">" + months[s] + "</li>";
				}
				string += "</ul>";
				changeMonth();
				return string;
			});
		});
	});
}

function changeMonth() {
	$(function() {
		$(".changeMonth").click(function() {
			var tmpmonth = $(this).text();
			var month = tmpmonth.substring(0, 3);
			var year = $(".year").text();
			var numMonth = 1;
			for (var i = 0 ; i < months.length; i++) {
				if (months[i] == month) {
					numMonth = i + 1;
					break;
				}
			}
			document.location.href="index.php?year=" + year + "&month=" + numMonth;
		});
	});
}

function displayYears() {
	$(function() {
		$(".year").click(function() {
			$(this).hide();
			var currentYear = parseInt($(this).text());
			var difference = currentYear % 10;
			$("#AllYear").html(function() {
				var string = "";
				string += "<ul id=\"popupYeaLi\">";
				for (var i = currentYear - difference; i <= currentYear - difference + 9; i++) {
					string += "<li class=\"changeYear\" onclick=\"changeYear()\">" + i + "</li>";
				}
				string += "</ul>";
				return string;
			});
		});
	});
}

function changeYear() {
	$(function() {
		$(".changeYear").click(function() {
			var year = parseInt($(this).text());
			var numMonth = 1;
			document.location.href="index.php?year=" + year + "&month=" + numMonth;
		});
	});
}

function prevYear() {
	$(function() {
		$("#prevYear").click(function() {
			var currentYear = parseInt($(".year").text());
			var year = currentYear - 1;
			document.location.href="index.php?year=" + year + "&month=1";
		});
	});
}

function nextYear() {
	$(function() {
		$("#nextYear").click(function() {
			var currentYear = parseInt($(".year").text());
			var year = currentYear + 1;
			document.location.href="index.php?year=" + year + "&month=1";
		});
	});
}

function prevMonth() {
	$(function() {
		$("#prevMonth").click(function() {
			var year = parseInt($(".year").text());
			var tmpMonth = $("#month").text();
			tmpMonth = tmpMonth.substring(0, 3);
			var numMonth = 1;
			for (var i = 0 ; i < months.length; i++) {
				if (months[i] == tmpMonth) {
					numMonth = i + 1;
					break;
				}
			}
			document.location.href="index.php?year=" + year + "&month=" + (numMonth - 1);
		});
	});
}

function nextMonth() {
	$(function() {
		$("#nextMonth").click(function() {
			var year = parseInt($(".year").text());
			var tmpMonth = $("#month").text();
			tmpMonth = tmpMonth.substring(0, 3);
			var numMonth = 1;
			for (var i = 0 ; i < months.length; i++) {
				if (months[i] == tmpMonth) {
					numMonth = i + 1;
					break;
				}
			}
			document.location.href="index.php?year=" + year + "&month=" + (numMonth + 1);
		});
	});
}