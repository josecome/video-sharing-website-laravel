<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Video Sharing Website</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album-rtl/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function showHideFilter() {
            var x = document.getElementById("filterDiv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        async function setFilter() {
            var province = document.getElementById("filter_province").value;
            var start_date = document.getElementById("filter_initial_date").value;
            var end_date = document.getElementById("filter_end_date").value;
            try {
                axios({
                    method: 'post',
                    url: '/filterpar/${ province }/${ start_date }/${ end_date }',
                });
            } catch (error) {
                console.error(error);
            }
        }
        async function removeFilter() {
            try {
                axios({
                    method: 'post',
                    url: '/removefilterpar',
                });
            } catch (error) {
                console.error(error);
            }
        }
        async function getDistricts(prov) {
            axios.get('/districts', {
                params: {
                province: prov
            }
        })
        .then(function (response) {
            DistrictSelect = document.getElementById('district');
            CodeSelect = document.getElementById('code');
            RainySeasonSelect = document.getElementById('rainy_season');
            data_districts = response.data.districts;
            data_codes = response.data.centers;
            data_rainy_seasons = response.data.rainy_seasons;
            var i; var j; var z;
            try {
	            for(i=DistrictSelect.options.length-1;i>=0;i--)
	            {
		            DistrictSelect.remove(i);
	            }
            } catch (error) {}
            try {
                for(j=CodeSelect.options.length-1;j>=0;j--)
	            {
		            CodeSelect.remove(j);
	            }
            } catch (error) {}
            try {
                for(z=RainySeasonSelect.options.length-1;z>=0;z--)
	            {
		            RainySeasonSelect.remove(z);
	            }
            } catch (error) {}

            try {
                for(var i = 0; i < data_districts.length; i++) {
                    DistrictSelect.options[DistrictSelect.options.length] = new Option(data_districts[i].name, data_districts[i].code);
                }
            } catch (error) {}
            try {
                for(var i = 0; i < data_codes.length; i++) {
                    CodeSelect.options[CodeSelect.options.length] = new Option(data_codes[i].code, data_codes[i].code);
                }
            } catch (error) {}
            try {
                for(var i = 0; i < data_rainy_seasons.length; i++) {
                    RainySeasonSelect.options[RainySeasonSelect.options.length] = new Option(data_rainy_seasons[i].year, data_rainy_seasons[i].year);
                }
            } catch (error) {}
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function () {
        // always executed
        });
        }
    </script>
    <style>
    .title {
        margin-top: 6%;
        padding: 20px;
    }
    .img-wrap {
        position: relative;
    }
    .img-wrap::before {
        background-image: -webkit-linear-gradient(to left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }
    body {
        background: url(front_image.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .text_white {
        color: white;
    }
    #map {
    height: 100%;
    }

    </style>

</head>

<body>
    @include('flash_messages')
    @include('header')
    @yield('main')
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
