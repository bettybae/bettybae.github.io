var greenbold = ["aboard", "about", "above", "across", "after", "against", "along", "amid", "among", "anti", "around", "as", "at", "before", "behind", "below", "beneath", "beside", "besides", "between", "beyond", "but", "by", "concerning", "considering", "despite", "down", "during", "except", "excepting", "excluding", "following", "for", "from", "in", "inside", "into", "like", "minus", "near", "of", "off", "on", "onto", "opposite", "outside", "over", "past", "per", "plus", "regarding", "round", "save", "since", "than", "through", "to", "toward", "towards", "under", "underneath", "unlike", "until", "up", "upon", "versus", "via", "with", "within", "without"];
var bluebold = ["am", "are", "is", "was", "were"];
var tip = {"after":"hello world", "take-action":"CHANGE TO act"};
			
$(document).ready(function(){	
	$("button").click(function(){
		var article = $("textarea").val().split("\n");
					
		var paragraph = new Array();
		for(var i in article) paragraph[i] = article[i].split(/\. |\." /);
						
		for(var i in article) {
			for(var j in paragraph[i])
				paragraph[i][j] = paragraph[i][j].split(" ");
		}
					
		var output = "";
				
		for(var i in article) {
			output += "<p>";
			for(var j in paragraph[i]) {
				var count = 0;
				for(var x in paragraph[i][j]) {
					if(count == 0) output += "<span class=\"box\">"; 
								
					if(in_array(paragraph[i][j][x].toLowerCase(), greenbold))
						output += "<span class=\"word "+paragraph[i][j][x]+" greenbold\">"+paragraph[i][j][x]+"</span>";
					else if(in_array(paragraph[i][j][x].toLowerCase(), bluebold))
						output += "<span class=\"word "+paragraph[i][j][x]+" bluebold\">"+paragraph[i][j][x]+"</span>";
					else output += "<span class=\"word "+paragraph[i][j][x]+"\">"+paragraph[i][j][x]+"</span>";
													
					count++;
					
					if(count == 6 || ((6 > paragraph[i][j].length) && (paragraph[i][j].length==count))) output += '</span>';
					if(paragraph[i][j].length == count && paragraph[i][j][0]) output += ".";
							
					output += " ";
				}
			}
			output += "</p>";
		}
		
		for(var i in tip) {
			var splitKey = i.split("-");
			var plainRegex = "";
			for(var j in splitKey) {
				plainRegex += "<span class=\"word "+splitKey[j]+".+?>"+splitKey[j]+"<\\/span>";
				if(splitKey.length > j+1) plainRegex += " ";
			}
			var regex = new RegExp(plainRegex, "ig");
			var match = output.match(regex);
			for(var dd in match) console.log(match[dd]);
			console.log(match);
			output = output.replace(regex, "<span class=\"redbold "+i+"\">"+i.replace("-", " ")+"</span>");
		}
		
		$("div.result").html(output);
		$("span.redbold span").removeClass("greenbold").removeClass("bluebold");
		
		$("span.redbold").mouseenter(function() {
			var spacetoslash = $(this).text().toLowerCase().replace(" ", "-"); 
			
			if(typeof tip[spacetoslash] != "undefined") {
				var position = $(this).position();
				var tooltip = $("body").append('<span class="tooltip" style="padding:5px;background:yellow;position:absolute;top:'+(position['top']+25)+'px;left:'+position['left']+'px;">'+tip[spacetoslash]+'</span>');
			}
		}).mouseleave(function() {
			$("span.tooltip").remove();
		});
	});
});
			
function in_array(what, where) {
	var a = false;
	
	for(var i=0;i<where.length;i++) {
		if(what == where[i]){
			a = true;
			break;
		}
	}
	
	return a;
}