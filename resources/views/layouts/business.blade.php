<script>
    function getKabupaten(id, count = 0) {
        const datalocal = localStorage.getItem('kabupaten_' + id);
        if (datalocal) {
            const data = JSON.parse(datalocal);
            loadJsonPerbatasan(data.jsonfile, count);
        } else {
            $.ajax({
                url: "{{ url('kabupaten') }}/" + id,
                dataType: "json",
                success: function(response) {
                    const data = response?.data[0];
                    localStorage.setItem('kabupaten_' + id, JSON.stringify(data));
                    loadJsonPerbatasan(data.jsonfile, count);
                },
                error: function(xhr, status, error) {
                    // console.log(xhr.responseText);
                    alert('Error: ' + xhr.responseText)
                }
            });
        }
    }

    function getKabupatenPolaRuang(id, count = 0, daerah) {
        const datalocal = localStorage.getItem('kabupaten_' + id);
        if (datalocal) {
            const data = JSON.parse(datalocal);
            loadJsonPolaRuang(data.jsonfile, count, daerah);
        } else {
            $.ajax({
                url: "{{ url('kabupaten') }}/" + id,
                dataType: "json",
                success: function(response) {
                    const data = response?.data[0];
                    localStorage.setItem('kabupaten_' + id, JSON.stringify(data));
                    loadJsonPolaRuang(data.jsonfile, count, daerah);
                },
                error: function(xhr, status, error) {
                    // console.log(xhr.responseText);
                    alert('Error: ' + xhr.responseText)
                }
            });
        }

    }

    function loadJsonPerbatasan(filename, count = 0) {
        var bataskec = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "white", //Warna tengah polygon
                    fillOpacity: 0,
                    color: "black",
                    weight: 1,
                    opacity: 0.6,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Kecamatan</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.KECAMATAN);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        bataskec.resetStyle(e.target);

                        let opacity = window['opacity_rencana_pola_ruang'];
                        if (opacity > 0.6) {
                            opacity = 0.6;
                        }

                        bataskec.setStyle({
                            opacity: opacity
                        });
                    }
                });
            },
        });
        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    bataskec.addData(JSON.parse(data));
                    map.addLayer(bataskec);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        if (count > 0) {
            // console.log(`layer_perbatasan_${count}`);
            window[`layer_perbatasan_${count}`] = bataskec;
        } else {
            window['layer_perbatasan'] = bataskec;
        }
    }

    function loadJsonPolaRuang(filename, count = 0, daerah = '') {
        window['opacity_rencana_pola_ruang'] = 0.8;
        var layerColors1 = {
            "Kawasan yang Memberikan Perlindungan terhadap Kawasan Bawahannya": "#224027",
            "Kawasan Ekosistem Mangrove": "#2D966E",
            "Kawasan Perlindungan Setempat": "#05D7D7",
            "Kawasan Pencadangan Konservasi di Laut": "#5A9696",
            "Badan Air": "#97DBF2",
            "Kawasan Konservasi": "#783CCD",
            "Kawasan Hutan Produksi": "#009B37",
            "Kawasan Pertanian": "#C8C83C",
            "Kawasan Pertambangan dan Energi": "#051937",
            "Kawasan Pergaraman": "#B49678",
            "Kawasan Pariwisata": "#FFA5FF",
            "Kawasan Perikanan": "#507DD2",
            "Kawasan Permukiman": "#FF7D00",
            "Kawasan Peruntukan Industri": "#690000",
            "Kawasan Transportasi": "#D73700",
            "Kawasan Pertahanan dan Keamanan": "#9B00FF"
        };

        var rpr = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: layerColors1[feature.properties.NAMOBJ],
                    fillOpacity: 0.8,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Diizinkan</th><td>" + feature.properties.diizinkan + "</td></tr>" + "<tr><th>Bersyarat</th><td>" + feature.properties.bersyarat + "</td></tr>" + "<tr><th>Dilarang</th><td>" + feature.properties.dilarang + "</td></tr>" + "<tr><th>Ketentuan Tambahan</th><td>" + feature.properties.tambahan + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.NAMOBJ);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        rpr.resetStyle(e.target);
                        let opacity = window['opacity_rencana_pola_ruang'];
                        if (opacity > 0.8) {
                            opacity = 0.8;
                        }
                        rpr.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        if (daerah == '') {
            if (count > 0) {
                // console.log(`layer_rencana_pola_ruang_${count}`);
                window[`layer_rencana_pola_ruang_${count}`] = rpr;
            } else {
                window['layer_rencana_pola_ruang'] = rpr;
            }
        } else {
            window[`layer_rencana_pola_ruang_${daerah}`] = rpr;
        }


        $.ajax({
            url: "{{ url('jsonfile') }}/" + 'rpr_' + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    rpr.addData(JSON.parse(data));
                    map.addLayer(rpr);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });
    }

    function loadJsonKkop(filename) {
        window['opacity_ketentuan_khusus_kkop'] = 1;
        var ketsuskkop = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_KKOP_1 + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_KKOP_1);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsuskkop.resetStyle(e.target);
                        let opacity = window['opacity_ketentuan_khusus_kkop'];

                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }

                        ketsuskkop.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsuskkop.addData(JSON.parse(data));
                    map.addLayer(ketsuskkop);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_kkop'] = ketsuskkop;
    }

    function loadJsonKp2b(filename) {
        window['opacity_ketentuan_khusus_kp2b'] = 0.5;
        var ketsuskp2b = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "green",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_KP2B_2 + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_KP2B_2);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsuskp2b.resetStyle(e.target);
                        let opacity = window['opacity_ketentuan_khusus_kp2b'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }
                        ketsuskp2b.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsuskp2b.addData(JSON.parse(data));
                    map.addLayer(ketsuskp2b);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_kp2b'] = ketsuskp2b;
    }

    function loadJsonKrb(filename) {
        window['opacity_ketentuan_khusus_bencana'] = 0.5;
        var ketsuskrb = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_KRB_03 + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_KRB_03);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsuskrb.resetStyle(e.target);
                        let opacity = window['opacity_ketentuan_khusus_bencana'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }
                        ketsuskrb.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsuskrb.addData(JSON.parse(data));
                    map.addLayer(ketsuskrb);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_bencana'] = ketsuskrb;
    }

    function loadJsonCagarBudaya(filename) {
        window['opacity_ketentuan_khusus_cagar_budaya'] = 0.5;
        var ketsuscagbud = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_CAGBUD + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_CAGBUD);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsuscagbud.resetStyle(e.target);
                        let opacity = window['opacity_ketentuan_khusus_cagar_budaya'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }
                        ketsuscagbud.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsuscagbud.addData(JSON.parse(data));
                    map.addLayer(ketsuscagbud);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_cagar_budaya'] = ketsuscagbud;
    }

    function loadJsonResapanAir(filename) {
        window['opacity_ketentuan_khusus_resapan_air'] = 0.5;
        var ketsusresair = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_RESAIR + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_RESAIR);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsusresair.resetStyle(e.target);
                        let opacity = window['opacity_ketentuan_khusus_resapan_air'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }
                        ketsusresair.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsusresair.addData(JSON.parse(data));
                    map.addLayer(ketsusresair);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_resapan_air'] = ketsusresair;
    }

    function loadJsonSempadan(filename) {
        window['opacity_ketentuan_khusus_sempadan'] = 0.5;
        var ketsusksmpdn = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_KSMPDN + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_KSMPDN);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsusksmpdn.resetStyle(e.target);
                        let opacity = window['opacity_ketentuan_khusus_sempadan'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }
                        ketsusksmpdn.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsusksmpdn.addData(JSON.parse(data));
                    map.addLayer(ketsusksmpdn);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_sempadan'] = ketsusksmpdn;
    }

    function loadJsonHankam(filename) {
        window['opacity_ketentuan_khusus_hankam'] = 0.5;
        var ketsushankam = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_HANKAM + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_HANKAM);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsushankam.resetStyle(e.target);
                        let opacity = window['opacity_ketentuan_khusus_hankam'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }
                        ketsushankam.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsushankam.addData(JSON.parse(data));
                    map.addLayer(ketsushankam);
                });
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_hankam'] = ketsushankam;
    }

    function loadJsonKarst(filename) {
        window['opacity_ketentuan_khusus_karst'] = 0.5;
        var ketsuskkarst = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_KKARST + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_KKARST);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsuskkarst.resetStyle(e.target);
                        let opacity = window['opacity_ketentuan_khusus_karst'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }
                        ketsuskkarst.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsuskkarst.addData(JSON.parse(data));
                    map.addLayer(ketsuskkarst);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_karst'] = ketsuskkarst;
    }

    function loadJsonPertambangan(filename) {
        window['opacity_ketentuan_khusus_pertambangan'] = 0.5;
        var ketsusptbgmb = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_PTBGMB + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_PTBGMB);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsusptbgmb.resetStyle(e.target);
                        let opacity = window['opacity_ketentuan_khusus_pertambangan'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }
                        ketsusptbgmb.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsusptbgmb.addData(JSON.parse(data));
                    map.addLayer(ketsusptbgmb);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_pertambangan'] = ketsusptbgmb;
    }

    function loadJsonMigrasiSatwa(filename) {
        window['opacity_ketentuan_khusus_migrasi_satwa'] = 0.5;
        var ketsusmgrsat = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_MGRSAT + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_MGRSAT);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsusmgrsat.resetStyle(e.target);

                        let opacity = window['opacity_ketentuan_khusus_migrasi_satwa'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }

                        ketsusmgrsat.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsusmgrsat.addData(JSON.parse(data));
                    map.addLayer(ketsusmgrsat);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_migrasi_satwa'] = ketsusmgrsat;
    }

    function loadJsonDklp(filename) {
        window['opacity_ketentuan_khusus_dlkp'] = 0.5;
        var ketsusdlkpel = L.geoJson(null, {
            style: function(feature) {
                return {
                    fillColor: "red",
                    fillOpacity: 0.5,
                    opacity: 0,
                    clickable: true
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Peruntukan</th><td>" + feature.properties.d_DLKPEL + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.d_DLKPEL);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        ketsusdlkpel.resetStyle(e.target);

                        let opacity = window['opacity_ketentuan_khusus_dlkp'];
                        if (opacity > 0.5) {
                            opacity = 0.5;
                        }

                        ketsusdlkpel.setStyle({
                            fillOpacity: opacity
                        });
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    ketsusdlkpel.addData(JSON.parse(data));
                    map.addLayer(ketsusdlkpel);
                });
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_ketentuan_khusus_dlkp'] = ketsusdlkpel;
    }

    function loadJsonPemukiman(filename) {
        var iconpermukiman = {
            "Pusat Kegiatan Nasional (PKN)": "img/PKN.png",
            "Pusat Kegiatan Wilayah (PKW)": "img/pkw.png",
            "Pusat Kegiatan Lokal (PKL)": "img/pkl.png"
        };

        var permukimanLayer = L.geoJson(null);
        var permukiman = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: L.icon({
                        iconUrl: iconpermukiman[feature.properties.NAMOBJ],
                        iconSize: [24, 24],
                        iconAnchor: [12, 28],
                        popupAnchor: [0, -25]
                    }),
                    title: feature.properties.REMARK,
                    riseOnHover: true
                });
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Nama Objek</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    permukiman.addData(JSON.parse(data));
                    map.addLayer(permukiman);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });
    }

    function loadJsonJaringanTransportasi(filename) {
        var transportcolors1 = {
            "Alur-Pelayaran Masuk Pelabuhan": "#00BEFA",
            "Alur-Pelayaran Sungai dan Alur-Pelayaran Danau": "#FF8C00",
            "Alur-Pelayaran Umum dan Perlintasan": "#005CE6",
            "Jalan Arteri Primer": "#FF5100",
            "Jalan Kolektor Primer": "#FF8C00",
            "Jalan Tol": "#F50000",
            "Jalur Pendaratan dan Penerbangan di Laut": "#9BFFDE",
            "Jaringan Jalur Kereta Api": "#000000",
            "Lintas Penyeberangan Antarkabupaten/Kota dalam Provinsi": "#FFC800",
            "Lintas Penyeberangan Antarprovinsi": "#FF7800"
        };
        window['opacity_jaringan_transportasi'] = 1;
        var jalan_arteri = L.geoJson(null, {
            style: function(feature) {
                return {
                    color: transportcolors1[feature.properties.NAMOBJ],
                    weight: 3,
                    opacity: 1
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Rencana Jaringan Transportasi</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        console.log(e.target.options.opacity);
                        jalan_arteri.resetStyle(e.target);
                        const opacity = window['opacity_jaringan_transportasi'];
                        jalan_arteri.setStyle({
                            opacity: opacity
                        })
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    jalan_arteri.addData(JSON.parse(data));
                    map.addLayer(jalan_arteri);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_jaringan_transportasi'] = jalan_arteri;
    }

    function loadJsonJaringanTerminal(filename) {
        var iconterminal = {
            "Terminal Penumpang Tipe A": "img/terminal_a.png",
            "Terminal Penumpang Tipe B": "img/terminal_b.png",
            "Bandar Udara Khusus": "img/bandara_khusus.png",
            "Bandar Udara Pengumpul": "img/bandara_pengumpul.png",
            "Jembatan Timbang": "img/jembatan_timbang.png",
            "Pangkalan Pendaratan Ikan": "img/ppi.png",
            "Pelabuhan Pengumpan": "img/pelabuhan_pengumpan.png",
            "Pelabuhan Pengumpul": "img/pelabuhan_pengumpul.png",
            "Pelabuhan Penyeberangan": "img/pelabuhan_penyeberangan.png",
            "Pelabuhan Perikanan Nusantara": "img/pelabuhan_perikanan.png",
            "Pelabuhan Sungai dan Danau": "img/pelabuhan_sungai.png",
            "Pelabuhan Utama": "img/pelabuhan_utama.png",
            "Stasiun Kereta Api": "img/stasiun_ka.png",
            "Terminal Barang": "img/terminal_barang.png",
            "Terminal Khusus": "img/terminal_khusus.png"
        };
        window['opacity_infrastruktur_transportasi'] = 1;
        var terminalLayer = L.geoJson(null);
        var terminal = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: L.icon({
                        iconUrl: iconterminal[feature.properties.NAMOBJ],
                        iconSize: [24, 24],
                        iconAnchor: [12, 28],
                        popupAnchor: [0, -25]
                    }),
                    title: feature.properties.NAMOBJ,
                    riseOnHover: true
                });
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Jenis Rencana</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    terminal.addData(JSON.parse(data));
                    map.addLayer(terminal);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_infrastruktur_transportasi'] = terminal;
    }

    function loadJsonJaringanEnergi(filename) {
        var energicolors1 = {
            "Jaringan Minyak dan Gas Bumi": "#FF7F7F",
            "Jaringan Pipa/Kabel Bawah Laut Penyaluran Tenaga Listrik": "#824600",
            "Jaringan Transmisi Tenaga Listrik Antarsistem": "#FF9600"
        };

        window['opacity_jaringan_energi'] = 1;

        var jaringangas = L.geoJson(null, {
            style: function(feature) {
                return {
                    color: energicolors1[feature.properties.NAMOBJ],
                    weight: 3,
                    opacity: 1
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Rencana Jaringan Energi</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        jaringangas.resetStyle(e.target);
                        const opacity = window['opacity_jaringan_energi'];
                        jaringangas.setStyle({
                            opacity: opacity
                        })
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    jaringangas.addData(JSON.parse(data));
                    map.addLayer(jaringangas);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_jaringan_energi'] = jaringangas;
    }

    function loadJsonInfraEnergi(filename) {
        var iconstasiun = {
            "Gardu Listrik": "img/gardu_listrik.png",
            "Infrastruktur Minyak dan Gas Bumi": "img/infrastruktur_minyak.png",
            "Infrastruktur Pembangkitan Tenaga Listrik dan Sarana Pendukung": "img/infrastruktur_pembangkit.png"
        };

        var stasiunLayer = L.geoJson(null);
        var stasiun = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: L.icon({
                        iconUrl: iconstasiun[feature.properties.NAMOBJ],
                        iconSize: [24, 24],
                        iconAnchor: [12, 28],
                        popupAnchor: [0, -25]
                    }),
                    title: feature.properties.REMARK,
                    riseOnHover: true
                });
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Nama Objek</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    stasiun.addData(JSON.parse(data));
                    map.addLayer(stasiun);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });
    }

    function loadJsonJaringanTetap(filename) {
        window['opacity_jaringan_tetap'] = 1;
        var jaringantelkom = L.geoJson(null, {
            style: function(feature) {
                return {
                    color: "#e3ec53",
                    type: "dash",
                    weight: 3,
                    opacity: 1
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Rencana Jaringan Telekomunikasi</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        jaringantelkom.resetStyle(e.target);
                        const opacity = window['opacity_jaringan_tetap'];
                        jaringantelkom.setStyle({
                            opacity: opacity
                        })
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    jaringantelkom.addData(JSON.parse(data));
                    map.addLayer(jaringantelkom);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_jaringan_tetap'] = jaringantelkom;
    }

    function loadJsonInfraTetap(filename) {
        var jembatantimbang = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: L.icon({
                        iconUrl: "img/telkom.png",
                        iconSize: [24, 24],
                        iconAnchor: [12, 28],
                        popupAnchor: [0, -25]
                    }),
                    title: feature.properties.NAMOBJ,
                    riseOnHover: true
                });
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Nama Objek</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    jembatantimbang.addData(JSON.parse(data));
                    map.addLayer(jembatantimbang);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });
    }

    function loadJsonSumberDayaAir1(filename) {
        window['opacity_jaringan_sumber_daya_air'] = 1;
        var sdacolors1 = {
            "Jaringan Pengendalian Banjir": "#004DA8",
            "Sistem Jaringan Irigasi": "#005CE6"
        };

        var spam = L.geoJson(null, {
            style: function(feature) {
                return {
                    color: sdacolors1[feature.properties.NAMOBJ],
                    weight: 3,
                    opacity: 1
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Rencana Jaringan SDA</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        spam.resetStyle(e.target);
                        const opacity = window['opacity_jaringan_sumber_daya_air'];
                        spam.setStyle({
                            opacity: opacity
                        })
                    }
                });
            }
        });


        console.log(spam);
        window['layer_jaringan_sumber_daya_air'] = spam;
        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    spam.addData(JSON.parse(data));
                    map.addLayer(spam);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

    }

    function loadJsonSumberDayaAir(filename) {
        window['opacity_jaringan_sumber_daya_air'] = 1;
        var sdacolors1 = {
            "Jaringan Pengendalian Banjir": "#004DA8",
            "Sistem Jaringan Irigasi": "#005CE6"
        };

        var spam = L.geoJson(null, {
            style: function(feature) {
                return {
                    color: sdacolors1[feature.properties.NAMOBJ],
                    weight: 3,
                    opacity: 1
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Rencana Jaringan SDA</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        spam.resetStyle(e.target);
                        const opacity = window['opacity_jaringan_sumber_daya_air'];
                        spam.setStyle({
                            opacity: opacity
                        })
                    }
                });
            }
        });


        console.log(spam);
        window['layer_jaringan_sumber_daya_air'] = spam;
        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    spam.addData(JSON.parse(data));
                    map.addLayer(spam);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

    }

    function loadJsonSumberDayaAir(filename) {
        var iconpelabuhan = {
            "Bangunan Pengendalian Banjir": "img/bangunan_banjir.png",
            "Bangunan Sumber Daya Air": "img/bangunan_sda.png"
        };

        var pelabuhanLayer = L.geoJson(null);
        var pelabuhan = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: L.icon({
                        iconUrl: iconpelabuhan[feature.properties.NAMOBJ],
                        iconSize: [24, 24],
                        iconAnchor: [12, 28],
                        popupAnchor: [0, -25]
                    }),
                    title: feature.properties.NAMA,
                    riseOnHover: true
                });
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Nama Objek</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    pelabuhan.addData(JSON.parse(data));
                    map.addLayer(pelabuhan);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });
    }

    function loadJsonJaringanPrasarana(filename) {
        window['opacity_jaringan_prasarana_lainnya'] = 1;
        var jalurevakuasi = L.geoJson(null, {
            style: function(feature) {
                return {
                    color: "#e744d8",
                    type: "dash",
                    weight: 3,
                    opacity: 1
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Rencana Jaringan Lainnya</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "</td></tr>" + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                        }
                    });
                }
                layer.on({
                    mouseover: function(e) {
                        var layer = e.target;
                        layer.setStyle({
                            weight: 3,
                            color: "#00FFFF",
                            opacity: 1
                        });
                        if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                        }
                    },
                    mouseout: function(e) {
                        jalurevakuasi.resetStyle(e.target);
                        const opacity = window['opacity_jaringan_prasarana_lainnya'];
                        jalurevakuasi.setStyle({
                            opacity: opacity
                        })
                    }
                });
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    jalurevakuasi.addData(JSON.parse(data));
                    map.addLayer(jalurevakuasi);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        window['layer_jaringan_prasarana_lainnya'] = jalurevakuasi;
    }

    function loadJsonInfraPrasarana(filename) {
        var iconpembangkit = {
            "Infrastruktur Sistem Pengelolaan Air Limbah (SPAL)": "img/spal.png",
            "Infrastruktur Sistem Penyediaan Air Minum (SPAM)": "img/spam1.png",
            "Sistem Jaringan Persampahan": "img/sampah.png",
            "Sistem Pengelolaan Limbah Bahan Berbahaya dan Beracun (B3)": "img/b3.png"
        };

        var pembangkitLayer = L.geoJson(null);
        var pembangkit = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: L.icon({
                        iconUrl: iconpembangkit[feature.properties.NAMOBJ],
                        iconSize: [24, 24],
                        iconAnchor: [12, 28],
                        popupAnchor: [0, -25]
                    }),
                    title: feature.properties.REMARK,
                    riseOnHover: true
                });
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Nama Objek</th><td>" + feature.properties.NAMOBJ + "</td></tr>" + "<tr><th>Keterangan</th><td>" + feature.properties.REMARK + "<table>";
                    layer.on({
                        click: function(e) {
                            $("#feature-title").html(feature.properties.REMARK);
                            $("#feature-info").html(content);
                            $("#featureModal").modal("show");
                            // highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                        }
                    });
                }
            }
        });

        $.ajax({
            url: "{{ url('jsonfile') }}/" + filename,
            dataType: "json",
            success: function(response) {
                $(response.features).each(function(key, data) {
                    data = JSON.stringify(data);
                    pembangkit.addData(JSON.parse(data));
                    map.addLayer(pembangkit);
                });
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });
    }

    function loadPoldaData(id) {
        const dataa = $.ajax({
            url: "{{ url('polaruang') }}/" + id,
            dataType: "json",
            success: function(response) {
                const data = response?.data[0];
                return data;
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseText);
                alert('Error: ' + xhr.responseText)
            }
        });

        return dataa
    }

    function clearLayer(option = 'daerah') {
        map.eachLayer(function(layer) {
            if (layer.feature) {
                if (layer.feature.name == option) {
                    map.removeLayer(layer);
                }
            }
        });
    }

    function uncheckedPolaRuang() {
        const pola = document.querySelectorAll('#polaruang');
        pola.forEach(function(item) {
            item.checked = false;
        });
    }
</script>