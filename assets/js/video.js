var gumStream, recorder, input, encodingType;
URL = window.URL || window.webkitURL;
var audioContext, encodeAfterRecord = !0,
  AudioContext = window.AudioContext || window.webkitAudioContext,
  encodingTypeSelect = document.getElementById("encodingTypeSelect"),
  recordButton = document.getElementById("recordButton"),
  stopButton = document.getElementById("stopButton");

function startRecording() {
  intervalsx(), document.getElementById("recordButton").innerHTML = "Merekam...", console.log("startRecording() called");
  navigator.mediaDevices.getUserMedia({
    audio: !0,
    video: !1
  }).then(function(e) {
    __log("getUserMedia() success, stream created, initializing WebAudioRecorder..."), audioContext = new AudioContext, document.getElementById("formats").innerHTML = "Format: 2 channel " + encodingTypeSelect.options[encodingTypeSelect.selectedIndex].value + " @ " + audioContext.sampleRate / 1e3 + "kHz", gumStream = e, input = audioContext.createMediaStreamSource(e), encodingType = encodingTypeSelect.options[encodingTypeSelect.selectedIndex].value, encodingTypeSelect.disabled = !0, (recorder = new WebAudioRecorder(input, {
      workerDir: "assets/js/",
      encoding: encodingType,
      numChannels: 2,
      onEncoderLoading: function(e, t) {
        __log("Loading " + t + " encoder...")
      },
      onEncoderLoaded: function(e, t) {
        __log(t + " encoder loaded")
      }
    })).onComplete = function(e, t) {
      __log("Encoding complete"), createDownloadLink(t, e.encoding), encodingTypeSelect.disabled = !1
    }, recorder.setOptions({
      timeLimit: 30,
      encodeAfterRecord: encodeAfterRecord,
      ogg: {
        quality: .9
      },
      mp3: {
        bitRate: 160
      }
    }), recorder.startRecording(), __log("Recording started")
  }).catch(function(e) {
    recordButton.disabled = !1, stopButton.disabled = !0
  }), recordButton.disabled = !0, stopButton.disabled = !1
}

function stopRecording() {
  console.log("stopRecording() called"), gumStream.getAudioTracks()[0].stop(), stopButton.disabled = !0, recordButton.disabled = !0, recorder.finishRecording(), __log("Recording stopped")
}

function createDownloadLink(e, t) {
  var n = URL.createObjectURL(e),
    o = document.createElement("audio"),
    d = document.createElement("li"),
    i = document.createElement("a");
  o.controls = !0, o.src = n, i.href = n, i.download = (new Date).toISOString() + "." + t, i.innerHTML = i.download, d.appendChild(o);
  var c = new Date,
    r = String(c.getDate()).padStart(2, "0"),
    a = String(c.getMonth() + 1).padStart(2, "0"),
    l = c.getFullYear(),
    u = document.getElementById("refid").value + "_" + r + a + l;
  $("#namafile").val(u + ".wav");
  var s = document.createElement("a");
  s.href = "#", s.id = "upload_voice", s.innerHTML = "Upload", s.addEventListener("click", function(t) {
    var n = new XMLHttpRequest;
    n.onload = function(e) {
      4 === this.readyState && console.log("Server returned: ", e.target.responseText)
    };
    var o = new FormData;
    o.append("audio_data", e, u), n.open("POST", "Ujian/VoiceUpload", !0), n.send(o)
  }), d.appendChild(document.createTextNode(" ")), d.appendChild(s), recordingsList.appendChild(d), document.getElementById("upload_voice").click()
}

function __log(e, t) {
  console.log("\n" + e + " " + (t || ""))
}
recordButton.addEventListener("click", startRecording), stopButton.addEventListener("click", stopRecording);