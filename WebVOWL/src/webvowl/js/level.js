module.exports = function () {
	var level = {},
	data;
	
level.getLevel=function(id){
    jsonText=sessionStorage.getItem("_jsonText");
	try {
		data =JSON.parse(jsonText);
		console.log(data);
	} catch (e){
		
	}
	level=1000;
	
}

return level;
}