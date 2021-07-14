import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-google-maps',
  templateUrl: './google-maps.component.html',
  styleUrls: ['./google-maps.component.scss']
})
export class GoogleMapsComponent implements OnInit {

  title = 'gmaps';

  // position = {
  //   lat: -34.681,
  //   lng: -58.37
  // };

  // label = {
  //   color: 'red',
  //   text: 'Marcador'
  // };

  // center: google.maps.LatLngLiteral = {lat: 24, lng: 12};
  // zoom = 4;
  // markerOptions: google.maps.MarkerOptions = {draggable: false};
  // markerPositions: google.maps.LatLngLiteral[] = [];

  // vertices: google.maps.LatLngLiteral[] = [
  //   {lat: 13, lng: 13},
  //   {lat: -13, lng: 0},
  //   {lat: 13, lng: -13},
  // ];

  constructor() { }

  ngOnInit() {

    // const map = new google.maps.Map(
    //   document.getElementById('map') as HTMLElement,
    //   {
    //     zoom: 3,
    //     center: { lat: -28.024, lng: 140.887 },
    //   }
    // );
  }

  // addMarker(event: google.maps.MapMouseEvent) {
  //   this.markerPositions.push(event.latLng.toJSON());
  // }

  // onMapReady(event) {
  //   console.log(event);
  // }
}
