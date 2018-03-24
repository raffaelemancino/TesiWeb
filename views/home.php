<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="public/img/brand.svg">

<title>Pronto_{Web}</title>
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<link rel="stylesheet" href="public/css/checkbox.css">

<style>
.form-inline {
    .form-control {
      display: inline-block;
      width: auto;
      vertical-align: middle;
    }
}

.temporalresoult .alert .alert-warning {
    color: black;
}

#diagram {
    margin: 0;
    border: 0;
    padding: 0;
    width: 100%;
    height: 400px;
}
    
#progress-wrp {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    height: 30px;
    width: 100%;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
}
#progress-wrp .progress-bar{
    height: 100%;
    border-radius: 3px;
    background-color: greenyellow;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
}
#progress-wrp .status{
    top:3px;
    left:50%;
    position:absolute;
    display:inline-block;
    color: #000000;
}

#slidecontainer1 {
    width: 100%;
}


#slidecontainer2 {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}

</style>

</head>
<body>

<nav class="navbar navbar-light bg-faded" style="background-color: whitesmoke;">
    <a class="navbar-brand" href="#">
        <img src="public/img/brand.svg" width="32" height="32" alt="">
        Pronto_{Web}
    </a>
</nav>

<div class = 'container'>

    <div class = 'row justify-content-center'>
        <div class = 'col-8 col-sm-8'>

            <div class = 'alert alert-info mt-4'>

                <form id = 'upload_form' method = 'POST' action = 'log' class = 'form-inline'>
                    <div class = 'content' id = 'section_uploading'>
                        <div class = 'form-group'>
                            <input name = 'file' type = "file" accept=".mxml,.xes" id = 'log_upload' />
                        </div>
                    </div>
                     <div id="progress-wrp" class="content">
                                <div class="progress-bar"></div>
                                    <div class="status">0%</div>
                    </div>
                </form>

            </div>
            <a href='WebVOWL/deploy/index.html' target="_blank" id='btn_WVOWL' class = 'btn btn-info btn-sm invisible'>WebVOWL</a>
            <a href='#'  id='btn_settings' class = 'btn btn-info btn-sm invisible'>Settings</a>
            <a href='#' id='btn_annotate_activity' class = 'btn btn-info btn-sm invisible'>Layers</a>
            <a href="#" id="btn_tl" class="btn btn-info btn-sm invisible">Temporal Logic</a>
			
			
        </div>
    </div>

    <div id = 'settings' style='display:none'>
        <div class = 'row justify-content-center pt-3'>
            <div class = 'col-8 col-sm-8'>

                <form id = 'settings_form' method = 'POST' action = '#' class = 'form'>
                    <div class="form-group">
                        <label>Log Noise (&delta;)</label>
                        <input id='sigma' type="number" class="form-control" name='sigma' step="0.1" min="0" max="1" value='0.05'>
                    </div>
                    <div class="form-group">
                        <label>Fall Factor (&tau;)</label>
                        <input id='ff' type="number" class="form-control" name='ff' step="0.1" min="0" max="1" value='0.9'>
                    </div>
                    <div class="form-group">
                        <label>Relative to best</label>
                        <input id='rtb' type="number" class="form-control" name='rtb' step="0.1" min="0" max="1" value='0.75'>

                    </div>
                </form>

            </div>
        </div>

        <div class = 'row justify-content-center'>
            <div class = 'col-8 col-sm-8'>

                <div class = 'alert alert-warning'>
                    <label>Constraints</label>
                    <form id = 'constraints_form' method = 'POST' action = 'constraints' class = 'form-inline'>
                        <div class = 'content' id = 'section_uploading'>
                            <div class = 'form-group'>
                                <input name='file' type="file" accept=".xml" id='constraints_upload' />
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    <div class = 'row justify-content-center'>
            <div class = 'col-8 col-sm-8'>
                <div class = 'alert alert-warning'>
                 <label>Context Ontology - Mandatory for Activity/Resource Abstraction Level 1 and above</label>
                    <form id = 'ontology_form' method = 'POST' action = 'ontology' class = 'form-inline'>
                        <div class = 'content' id = 'section_uploading'>
                            <div class = 'form-group'>
                                <input name='file' type="file" accept=".owl" id='ontology_upload' />
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div id = 'annotate_activity' style='display:none'>
        <div class = 'row justify-content-center pt-3'>
            <div class = 'col-8 col-sm-8'>
                 <h5>Activity Abstraction Level</h5>
                 <div id="slidecontainer1">
				     <input type="range" min="0" max="4" value="0" class="slider" id="activityRange">
                     <p>Level: <span id="activityLevel"></span></p>
                 </div>
				 <a href='#' id='btn_annotate_resource' class = 'btn btn-info btn-sm invisible'>Resource</a>
			 </div>
         </div>
	 </div>
	 
     <div id = 'annotate_resource' style='display:none'>
        <div class = 'row justify-content-center pt-3'>
            <div class = 'col-8 col-sm-8'>
                <h5>Resource Abstraction Level</h5>
                <div id="slidecontainer2">
                    <input type="range" min="0" max="4" value="0" class="slider" id="resourceRange">
                    <p>Level: <span id="resourceLevel"></span></p>
                </div>
            </div>
         </div>
     </div>
	 
    <div id="tl" style="display: none">
        <div class="row justify-content-center pt-3">
            <div class="col-8 col-sm-8">
                <form id="tl_form" method="POST" action="#" class="form">
                    <div class="form-group">
                        <h5>Insert your LTL or CTL query</h5>
                        <input id="query" type="text" class="form-inline form-control" name="query" />
                        <label>Statements <code>LTLSPEC</code> and <code>CTLSPEC</code>
                            can be used to include LTL and CTL formulae respectively into
                            the file.In case of the LTL logic, the temporal operators
                            <code>G</code> (globally), <code>F</code> (finally), <code>X</code>
                            (next), <code>U</code> (until) can be used. Moreover, the
                            propositional logic operators are represented by: <code>!</code>
                            (not), <code>&</code> (and), <code>|</code> (or), <code>xor</code>
                            (exclusive or), <code>-></code> (implies) and <code><-></code> (equivalence).
                            In case of CTL following temporal logic operators can be used: <code>EG</code>
                            (exists globally), <code>EX</code> (exists next state), <code>EF</code>
                            (exists finally), <code>AG</code> (forall globally), <code>AX</code>
                            (forall next state), <code>AF</code> (forall finally), <code>E[U]</code>
                            (exists until), <code>A[U]</code> (forall until).</label>
                        <a id ="btn_check" class="btn btn-success" href="#">Check</a>
                    </div>
                    <div class="alert alert-warning" id="check_result">
                        
                    </div>
                </form> 
            </div>
        </div>
    </div>


    <div class = 'row justify-content-center pt-3'>
        <div class = 'col-8 col-sm-8'>
            <button id = 'btn_process' class = 'btn btn-success invisible'>Process</button>
            <a id = 'btn_download' class = 'btn btn-danger invisible' href='#'>Download XMI</a>
            <a id = 'btn_ontology' class = 'btn btn-danger invisible' href='#'>Download Ontology</a>
            <a id = 'btn_webvowl' target = '_blank' class = 'btn btn-danger invisible' href='http://visualdataweb.de/webvowl/'>Visualize Ontology</a>
            <a id = 'btn_visualize' class = 'btn btn-danger invisible' href='#'>Show Graph</a>
        </div>
    </div>

</div>
<div class = 'row justify-content-center pt-3'>
    <div class = 'col-12 col-sm-12'>
        <div id = 'diagram' style = 'display:none'></div>
    </div>
</div>

<script src='public/js/jquery-3.2.1.min.js'></script>
<script src='public/js/tether.min.js'></script>
<script src='public/js/bootstrap.min.js'></script>

<script src='public/js/go.js'></script>
<script src='public/js/cnet2ad.js'></script>
<script src='public/js/cnet2ad.graphics.js'></script>
<script src='public/js/upload.js'></script>    

<script>
	var sliderA = document.getElementById("activityRange");
	var outputA = document.getElementById("activityLevel");
	var sliderR = document.getElementById("resourceRange");
	var outputR = document.getElementById("resourceLevel");
	
	outputA.innerHTML = sliderA.value;
	sliderA.oninput = function() {
		outputA.innerHTML = this.value;
	}
	outputR.innerHTML = sliderR.value;
	sliderR.oninput = function() {
		outputR.innerHTML = this.value;
	}	
</script>

<script>
	/* se il buffer del browser viene modificato esegue la funzione che forza i livelli degli slider ai valori passati.
       ho mantenuto la logica secondo cui se resource non è mostrato allora viene settato a -1	*/
	window.addEventListener('storage', storageEventHandler, false);
	function storageEventHandler(){
			var retrievedObject = localStorage.getItem('storedLevelValue');
			var arrayLevel = JSON.parse(retrievedObject);
			console.log(arrayLevel);
			if(arrayLevel!=null){
				var value_activity = arrayLevel["activity"];
				var value_resource = arrayLevel["resource"];
				if (!$('#annotate_activity').is(':visible')){
					$('#annotate_activity').toggle('slow');
				}
				if(value_resource!=-1&&!$('#annotate_resource').is(':visible'))
					$('#annotate_resource').toggle('slow');
				if(value_activity>4)
					document.getElementById("activityRange").max=value_activity;
				document.getElementById("activityRange").value=value_activity;
				document.getElementById("activityLevel").innerHTML=value_activity;
				if(value_resource>4)
					document.getElementById("resourceRange").max=value_resource;
				document.getElementById("resourceRange").value=value_resource;
				if(value_resource==-1){
					document.getElementById("resourceLevel").innerHTML="Undefined";
				}else{
					document.getElementById("resourceLevel").innerHTML=value_resource;
				}
					
				
				localStorage.removeItem('storedLevelValue'); //resetta il valore passato da webvowl
			}
	}
</script>

<script>

var btn_process = document.getElementById('btn_process');
var btn_download = document.getElementById('btn_download');
var btn_visualize = document.getElementById( 'btn_visualize' );
var btn_ontology = document.getElementById('btn_ontology');
var btn_settings = document.getElementById('btn_settings');
var btn_webvowl = document.getElementById('btn_webvowl');
var btn_WVOWL = document.getElementById('btn_WVOWL');
var btn_annotate_activity = document.getElementById('btn_annotate_activity');
var btn_annotate_resource = document.getElementById('btn_annotate_resource');

var btn_tl = document.getElementById('btn_tl');
var btn_check = document.getElementById('btn_check');

var logFilename = null;
var constraintsFilename = null, businessOntology=null;

if( btn_process != null )
    btn_process.onclick = process;

if( btn_visualize != null )
    btn_visualize.onclick = visualize;

if( btn_settings != null )
    btn_settings.onclick = function(){
        $('#settings').toggle('slow');
    }

if(btn_tl != null)
    btn_tl.onclick = function(){
        $('#tl').toggle('slow');
    }

if(btn_check != null)
    btn_check.onclick = check;

if( btn_annotate_activity != null )
    btn_annotate_activity.onclick = function(){
        $('#annotate_activity').toggle('slow');
         if($('#annotate_resource').is(':visible'))
			 $('#annotate_resource').toggle('slow');
			
    }
if( btn_annotate_resource != null )
    btn_annotate_resource.onclick = function(){
        $('#annotate_resource').toggle('slow');
    }

/*
    Esegui l'upload del file di log
*/
document.getElementById('log_upload').onchange = function(e){
    // Resetta tutto
    if( btn_download.className.includes("invisible") == false )
        btn_download.className += ' invisible';
    if( btn_visualize.className.includes("invisible") == false )
        btn_visualize.className += ' invisible';
    if( btn_ontology.className.includes("invisible") == false )
        btn_ontology.className += ' invisible';
    if( btn_annotate_activity.className.includes("invisible") == false )
        btn_annotate_activity.className += ' invisible';
    if( btn_annotate_resource.className.includes("invisible") == false )
        btn_annotate_resource.className += ' invisible';
    if( btn_settings.className.includes("invisible") == false )
        btn_settings.className += ' invisible';
    if( btn_process.className.includes("invisible") == false )
        btn_process.className += ' invisible';
    if( btn_webvowl.className.includes("invisible") == false )
        btn_webvowl.className += ' invisible';
    if( btn_tl.className.includes("invisible") == false)
        btn_tl.className += ' invisible';


    logFilename = constraintsFilename = null;
    $('#diagram').hide();
    //Retrieve the first (and only!) File from the FileList object
   // var file = e.target.files[0];
   /* if (file) {
        var data = new FormData();
        data.append( 'file', file, file.name );
        $.ajax( {
            url: 'log',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            'success': function(e){

                if( e == "UPLOAD:ERROR" ){
                    alert("Upload fallito!");
                    if( btn_process.className.includes("invisible") == false )
                        btn_process.className += ' invisible';
                    return;
                }

                console.log( "Upload riuscito!");
                btn_process.className = btn_process.className.replace('invisible', '');
                logFilename = e;

            }
        } );        
    } */

   // var file = e.target.files[0];
      var file = $(this)[0].files[0];
    var upload = new Upload(file);

    // maby check size or type here with upload.getSize() and upload.getType()
    if (upload.getSize()>2000000)
        alert("Dimensione massima consentita 2MB")
    else
        // execute upload
        upload.doUpload(e);

}

document.getElementById('constraints_upload').onchange = function(e){
    //Retrieve the first (and only!) File from the FileList object
    var file = e.target.files[0];
    if (file) {
        var data = new FormData();
        data.append( 'constraints', file, file.name );
        $.ajax( {
            url: 'constraints' + '/' + logFilename,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            'success': function(e){

                if( e.indexOf("UPLOAD:ERROR")!=-1 ){
                    alert("Upload del file di vincoli fallito!");
                    return;
                }

                console.log( "Upload del file di vincoli riuscito!");
                constraintsFilename = e;

            }
        } );
    }
}
document.getElementById('ontology_upload').onchange = function(e){
    //Retrieve the first (and only!) File from the FileList object
    var file = e.target.files[0];
    if (file) {
        var data = new FormData();
        data.append( 'ontology', file, file.name );
        $.ajax( {
            url: 'ontology' + '/' + logFilename,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            'success': function(e){

                if( e.indexOf("UPLOAD:ERROR")!=-1 ){
                    alert("Upload dell'ontologia fallito!");
                    return;
                }

                console.log( "Upload dell'ontologia riuscito!");
                businessOntology = e;

            }
        } );
    }
}

function process(){
     // Resetta tutto
    if( btn_download.className.includes("invisible") == false )
        btn_download.className += ' invisible';
    if( btn_visualize.className.includes("invisible") == false )
        btn_visualize.className += ' invisible';
    if( btn_ontology.className.includes("invisible") == false )
        btn_ontology.className += ' invisible';
    if( btn_webvowl.className.includes("invisible") == false )
        btn_webvowl.className += ' invisible';
    if( btn_tl.className.includes("invisible") == false)
        btn_tl.className += ' invisible';
	
	var value_activity = document.getElementById('activityRange').value;
	var value_resource = document.getElementById('resourceRange').value;		
	
	if($('#annotate_resource').is(':hidden')||document.getElementById("resourceLevel").innerHTML=="Undefined")
		value_resource="-1";
	
    var cont ={ 
                sigma: (document.getElementById('sigma').value),
                ff: (document.getElementById('ff').value),
                rtb: (document.getElementById('rtb').value),
                constraints: constraintsFilename,
                level_activity: value_activity,
                level_resource: value_resource
            };

    var equals=businessOntology !=logFilename+".business";
    if (Number(cont.level_activity)>0 && businessOntology !=logFilename+".business")
        return  alert(" You selected an Activity Abstraction Level " + cont.level_activity + ". Context ontology needed.");
	if (Number(cont.level_resource)>0 && businessOntology !=logFilename+".business")
        return  alert(" You selected a Resource Abstraction Level " + cont.level_resource + ". Context ontology needed.");


    $.post( 'process/' + logFilename, cont)
        .done(function( e ) {

            if(e == "Cnet2ADRESULT:ERROR")
            {
                alert("Cnet2AD fallito!");
                if( btn_download.className.includes("invisible") == false )
                    btn_download.className += ' invisible';
                if( btn_visualize.className.includes("invisible") == false )
                    btn_visualize.className += ' invisible';
                if( btn_ontology.className.includes("invisible") == false )
                    btn_ontology.className += ' invisible';
                if( btn_webvowl.className.includes("invisible") == false )
                    btn_webvowl.className += ' invisible';
                if( btn_tl.className.includes("invisible") == false)
                    btn_tl.className += ' invisible';
                return;
            }

            btn_download.className = btn_download.className.replace('invisible', '');
            btn_ontology.className = btn_ontology.className.replace('invisible', '');
            btn_visualize.className = btn_visualize.className.replace('invisible', '');
            btn_webvowl.className = btn_webvowl.className.replace('invisible', '');
            btn_tl.className = btn_tl.className.replace('invisible','');

            xmi = e;

            btn_download.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent( xmi ));
            btn_download.setAttribute('download', 'Cnet2AD.xmi');

            btn_ontology.href = "bin/" + logFilename + ".owl";
            btn_ontology.setAttribute('download', 'SemanticCnet2AD.out.owl');

        }
    );


}

function visualize(){
    $.ajax( {
        url: 'visualize/' + logFilename,
        type: 'GET',
        data: null,
        processData: false,
        contentType: false,
        'success': function(e){

            if(e == "Visualize:ERROR")
            {
                alert("Cannot visualize the graph!");
                return;
            }

            var data = eval("[" + e + "]");

            Cnet2AD.show(data[0], data[1]);
            $('#diagram').show();

        }
    } );
}

function check()
{
    var temporal_query = document.getElementById('query').value;
    //window.alert(temporal_query);
    var settings = {
        file : logFilename,
        query : temporal_query
    };
    /*$.ajax({
        url: 'check/' + temporal_query,
        type: 'POST',
        success: function (result)
        {
            document.getElementById("check_result").innerHTML = result;
            if (result == "true")
            {
                document.getElementById("check_result").style.backgroundColor = '#b3ff66';
            }else{
                document.getElementById("check_result").style.backgroundColor = '#ffad99';
            }
        }
    });*/
    $.post( 'check/' + temporal_query, settings)
        .done(function( result )
        {
            document.getElementById("check_result").innerHTML = result;
            /*if (result == "true")
            {
                document.getElementById("check_result").style.backgroundColor = '#b3ff66';
            }else{
                document.getElementById("check_result").style.backgroundColor = '#ffad99';
            }*/
        });
}

Cnet2AD.init('diagram');

</script>

</body>
</html>