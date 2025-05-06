document.addEventListener('DOMContentLoaded', () => {
    // Pastikan token Mapbox diambil dengan benar
    mapboxgl.accessToken = window.mapboxToken;

    // Membuat peta dengan Mapbox
    const map = new mapboxgl.Map({
        container: 'map', // ID kontainer untuk peta
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [107.6191, -6.9175], // Sesuaikan pusat peta dengan koordinat yang diinginkan
        zoom: 12
    });

    // Menambahkan marker untuk setiap TPS yang ada
    window.tpsData.forEach(tps => {
        new mapboxgl.Marker()
            .setLngLat([tps.longitude, tps.latitude]) // Koordinat TPS
            .setPopup(new mapboxgl.Popup().setHTML(`<strong>${tps.nama_tps}</strong><br>${tps.alamat}`)) // Info popup
            .addTo(map); // Menambahkan marker ke peta
    });

    // Menambahkan marker TPS baru saat peta diklik
    map.on('click', function (e) {
        const nama = prompt("Masukkan nama TPS:");
        const alamat = prompt("Masukkan alamat:");
        if (!nama || !alamat) return;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Mengirimkan data TPS baru ke server
        fetch('/admin/tps', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                nama_tps: nama,
                alamat: alamat,
                latitude: e.lngLat.lat,
                longitude: e.lngLat.lng
            })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message); // Tampilkan pesan sukses

            // Menambahkan marker baru ke peta setelah data berhasil disimpan
            const newMarker = new mapboxgl.Marker()
                .setLngLat([e.lngLat.lng, e.lngLat.lat]) // Koordinat baru
                .setPopup(new mapboxgl.Popup().setHTML(`<strong>${nama}</strong><br>${alamat}`)) // Info popup
                .addTo(map);

            // Menambahkan TPS baru ke dalam data window.tpsData
            window.tpsData.push({
                nama_tps: nama,
                alamat: alamat,
                latitude: e.lngLat.lat,
                longitude: e.lngLat.lng
            });
        });
    });
});
