$this->load->view("admin/post/new_post",$data);

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
 
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('gambar')) 
        {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('Opps', 'Gambar Gagal di Upload !');
 
            $this->load->view('admin/post/new_post', $error);
        } 
        else 
        {
            $validation = $this->form_validation;
            $validation->set_rules($post->rules());

            if ($validation->run()) {
                $post->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $this->load->view("admin/post/new_post",$data);
        } <!--  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initialize" async defer></script> -->

    <script src="http://maps.googleapis.com/maps/api/js"></script>


  <!--   <script>
// variabel global marker
var marker; 

function taruhMarker(peta, posisiTitik){

    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
  } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
    });
  }
  
     // isi nilai koordinat ke form
     document.getElementById("lat").value = posisiTitik.lat();
     document.getElementById("lng").value = posisiTitik.lng();
     
 }
 
 function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-3.7869618804053333,103.54198419140998),
    zoom:13,
    mapTypeId:google.maps.MapTypeId.ROADMAP
};

var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
});

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);


</script> -->

<script type="text/javascript">   
    var marker;
    function initialize(){
        // Variabel untuk menyim

        //pan informasi lokasi
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel berisi properti tipe peta
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        // Pembuatan peta
        var peta = new google.maps.Map(document.getElementById('googleMap'), mapOptions);      
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        // Pengambilan data dari database MySQL
        <?php
      

        while ($post as $data)
        {
            $judul = $data['desc'];
            $lat = $data['latitude'];
            $lng = $data['langtitude'];

            echo ("addMarker($lat, $lon, '<b>$judul</b>');\n");                        
        }
        ?>

        // Proses membuat marker 
        function addMarker(lat, lng, info){
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: peta,
                position: lokasi
            });       
            peta.fitBounds(bounds);
            bindInfoWindow(marker, peta, infoWindow, info);
         }
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, peta, infoWindow, html){
            google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(peta, marker);
          });
        }
    }
</script>