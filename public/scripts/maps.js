var baseMaps = {
    "Satelit": L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Map data &copy; <a href="https://google.com/maps/">Google Maps</a>'
    }),
    "Terrain": L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        attribution: 'Map data &copy; <a href="https://google.com/maps/">Google Maps</a>'
    }),
};
var overlayMaps = {};

var map = L.map('map').setView([-7.597343575775382, 110.94985662865446], 13)
baseMaps.Satelit.addTo(map)
var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map)

var radius = L.circle()
var data_cabang = []
var data_jalur = []
var data_lahan = []
var state = '';
var eventHandlers = {
    mouseover: (event) => {
        let layer = event.target;

        layer.setStyle({
            weight: 6,
            opacity: 0.8
        });
    },
    mouseout: (event) => {
        let layer = event.target;
        layer.setStyle({
            weight: 3,
            opacity: 1
        });
    }
}

function load_data(type, url){
    $('.tempat_info').html('Loading...')
    //get data
    let data = $.ajax(url)
    data.done(function(w){
        switch (type) {
            case 'cabang':
                set_cabang(w);
                break;
            case 'lahan':
                set_lahan(w);
                break;
            case 'jalur':
                set_jalur(w);
                break;
        }

        layerControl.remove()
        layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map)
        $('.tempat_info').html('-')
    });

    data.fail(function(err){
        show_alert('danger', 'Error loading data '+type)
    })
}

function set_cabang(data){
    overlayMaps.Cabang = L.layerGroup([])
    data_cabang = data;
    data.forEach(function(cabang){
        var layer = L.circleMarker([cabang.latitude, cabang.longitude], {
            radius: 7,
            fillColor: cabang.warna,
            color: cabang.warna,
            weight: 1,
            opacity: 1,
            fillOpacity: 0.8,
            id: cabang.id
        })
        layer.on('click', function(e){
            state = 'cabang'
            $('.cabang').show()
            $('.bidang').hide()
            $('#kategori').html('Cabang')
            handleClick(e, true)
        })
        overlayMaps.Cabang.addLayer(layer)
    })
}

function set_jalur(data){
    overlayMaps.Jalur = L.layerGroup([])
    data_jalur = data;
    data.forEach(function(jalur){
        var layer = L.polyline(JSON.parse(jalur.posisi), {color: jalur.warna, id: jalur.id})
        eventHandlers.click = (e) => {
            state = 'jalur'
            $('#kategori').html('Jalur')
            $('.cabang').hide()
            $('.bidang').show()
            handleClick(e)
        }
        layer.on(eventHandlers)
        overlayMaps.Jalur.addLayer(layer)
    })
}

function set_lahan(data){
    overlayMaps.Lahan = L.layerGroup([])
    data_lahan = data;
    data.forEach(function(lahan){
        var layer = L.polygon(JSON.parse(lahan.posisi), {color: lahan.warna, id: lahan.id})
        eventHandlers.click = (e) => {
            state = 'lahan'
            $('#kategori').html('Lahan')
            $('.cabang').hide()
            $('.bidang').show()
            handleClick(e)
        }
        layer.on(eventHandlers)
        overlayMaps.Lahan.addLayer(layer)
    })
}

function handleClick(e, setRadius = false){
    radius.remove()
    map.flyTo(e.latlng, 17)
    if(setRadius){
        radius.setLatLng(e.latlng)
        radius.setRadius(30).addTo(map)
    }
    
    var id = e.target.options.id;
    $('#tempat_alert').html('')
    add_info(id)
    $('#info_map').addClass('right-sidebar-visible')
}
function add_info(id, fly){
    let data = {}
    switch (state) {
        case 'cabang':
            data = data_cabang.find(c => c.id === id)
            break;
        case 'lahan':
            data = data_lahan.find(c => c.id === id)
            break;
        case 'jalur':
            data = data_jalur.find(c => c.id === id)
            break;
    }

    if(fly == 'point'){
        radius.remove()
        map.flyTo([data.latitude, data.longitude], 17)
        radius.setLatLng([data.latitude, data.longitude])
        radius.setRadius(30).addTo(map)
    }
    if(fly == 'bounds'){
        let pos = JSON.parse(data.posisi)
        map.fitBounds(L.latLngBounds(pos))
    }

    set_info(data);
}
function set_info(data){
    $('#nama').html(data.nama)
    $('#kode').html(data.kode)
    $('#alamat').html(data.alamat)
    $('#fasilitas').html(data.fasilitas)
    $('#jenis').html(data.jenis)
    $('#created').html(data.created_at)
    $('#updated').html(data.updated_at)
}
function show_alert(warna, message){
    //reset
    $('.tempat_info').html('-')
    $('.action_info').each(function(i, element){
        let button = $(element)
        button.attr('href', 'javascript:void(0)')
    })
    $('#info_map').addClass('right-sidebar-visible')

    let html = `<div class="alert alert-${warna} alert-dismissable">${message}</div>`
    $('#tempat_alert').html(html)
}