import { MapsAPILoader } from '@agm/core';
import { Component, NgZone, OnInit } from '@angular/core';
import { FormControl, Validators } from '@angular/forms';
import { debounce, debounceTime } from 'rxjs/operators';
import { Coordenada } from 'src/app/core/modelo/coordenada.class';

@Component({
    selector: 'app-google-maps',
    templateUrl: './google-maps.component.html',
    styleUrls: ['./google-maps.component.scss']
})
export class GoogleMapsComponent implements OnInit {

    title = 'gmaps';

    position: Coordenada;

    zoom = 15;

    public inputSearch: FormControl = new FormControl('');

    // label = {
    //   color: 'red',
    //   text: 'Marcador'
    // };

    // center: google.maps.LatLngLiteral = {lat: 24, lng: 12};
    // zoom = 4;
    // markerOptions: google.maps.MarkerOptions = {draggable: false};
    // markerPositions: google.maps.LatLngLiteral[] = [];

    vertices: google.maps.LatLngLiteral[] = [
      {lat: 13, lng: 13},
      {lat: -13, lng: 0},
      {lat: 13, lng: -13},
    ];

    constructor(
        // private mapsAPILoader: MapsAPILoader,
        // private ngZone: NgZone
    ) { }

    ngOnInit() {
        this.initPosition();
        // const geocoder = new google.maps.Geocoder();

        this.inputSearch.valueChanges.pipe(debounceTime(300)).subscribe((data: string) => {
            console.log(data);
        });
    }

    // addMarker(event: google.maps.MapMouseEvent) {
    //   this.markerPositions.push(event.latLng.toJSON());
    // }

    // onMapReady(event) {
    //   console.log(event);
    // }


    // agm/core:
    /*

        https://www.youtube.com/watch?v=DQZTeZZXYBk
        https://angular-maps.com/api-docs/agm-core/index.html

        Tutorial:
        https://www.freakyjolly.com/angular-google-maps-using-agm-core/

    */

    private initPosition() {
        this.position = new Coordenada();
        if ('geolocation' in navigator) {
            navigator.geolocation.getCurrentPosition((position) => {
                this.position.lat = position.coords.latitude;
                this.position.long = position.coords.longitude;
            });
        }
    }

    // Ejecutado luego de que el usuario detiene el arrastre del marcador
    public markerDragEnd(e: MouseEvent) {

    }
}
