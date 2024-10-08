<html>
<head>
  <title>QR Scanner &ndash; Demo</title>
  <link rel="icon" type="image/png" href="favicon.png">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<style>
  body,
  html {
    padding: 0;
    margin: 0;
    font-family: 'Helvetica Neue', 'Calibri', Arial, sans-serif;
    height: 100%;
  }

  #app {
    background: #263238;
    display: flex;
    align-items: stretch;
    justify-content: stretch;
    height: 100%;
  }

  .sidebar {
    background: #eceff1;
    min-width: 250px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    overflow: auto;
  }

  .sidebar h2 {
    font-weight: normal;
    font-size: 1.0rem;
    background: #607d8b;
    color: #fff;
    padding: 10px;
    margin: 0;
  }

  .sidebar ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  .sidebar li {
    line-height: 175%;
    white-space: nowrap;
    overflow: hidden;
    text-wrap: none;
    text-overflow: ellipsis;
  }

  .cameras ul {
    padding: 15px 20px;
  }

  .cameras .active {
    font-weight: bold;
    color: #009900;
  }

  .cameras a {
    color: #555;
    text-decoration: none;
    cursor: pointer;
  }

  .cameras a:hover {
    text-decoration: underline;
  }

  .scans li {
    padding: 10px 20px;
    border-bottom: 1px solid #ccc;
  }

  .scans-enter-active {
    transition: background 3s;
  }

  .scans-enter {
    background: yellow;
  }

  .empty {
    font-style: italic;
  }

  .preview-container {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    display: flex;
    width: 100%;
    overflow: hidden;
  }

  .sidebar.expanded {
    min-width: 500px; 
  }
  .fosol p{
    color: white;
    font-size: 50px;
    font-weight: bold;
  }
</style>

<body>

  <div id="app">
    <div class="sidebar">
      <section class="cameras">
        <h2>Cameras</h2>
        <ul>
          <li v-if="cameras.length === 0" class="empty">No cameras found</li>
          <li v-for="camera in cameras">
            <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
            <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
              <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
            </span>
          </li>
        </ul>
      </section>
      <section class="scans">
        <h2>Scans</h2>
        <ul v-if="scans.length === 0">
          <li class="empty">No scans yet</li>
        </ul>
        <transition-group name="scans" tag="ul">
  <li v-for="scan in scans" :key="scan.date" :title="scan.content">
    <span v-if="expandedScan !== scan" @click="expandScan(scan)">{{ scan.content }}</span>
    <span v-else>
      {{ scan.content }}
      <button @click="collapseScan()">Close</button>
      <button @click="addToDatabase(scan.content)">Add to Database</button> 
    </span>
  </li>
</transition-group>

      </section>
    </div>
    <div class="preview-container">
      <div class="fosol">
        <p>FOSHOL</p>
      </div>
      <video id="preview"></video>
    </div>
  </div>
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      scanner: null,
      activeCameraId: null,
      cameras: [],
      scans: [],
      expandedScan: null 
    },
    mounted: function () {
      var self = this;
      self.scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });
      self.scanner.addListener('scan', function (content, image) {
        self.scans.unshift({ date: +(Date.now()), content: content });
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        self.cameras = cameras;
        if (cameras.length > 0) {
          self.activeCameraId = cameras[0].id;
          self.scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    },
    methods: {
      formatName: function (name) {
        return name || '(unknown)';
      },
      selectCamera: function (camera) {
        this.activeCameraId = camera.id;
        this.scanner.start(camera);
      },
      expandScan: function (scan) {
        this.expandedScan = scan;     
        document.querySelector('.sidebar').classList.add('expanded');
      },
      collapseScan: function () {
        this.expandedScan = null;
        
        document.querySelector('.sidebar').classList.remove('expanded');
      },
    
      addToDatabase: function (content) {
        var self = this;
        
        fetch('addingqr.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: 'content=' + encodeURIComponent(content)
        })
        .then(function (response) {
        
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          
          alert('Details saved.');
        })
        .catch(function (error) {       
          console.error('There was a problem with the fetch operation:', error);
        });
      }
    }
  });
</script>

</body>

</html>
