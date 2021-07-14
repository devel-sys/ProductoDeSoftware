import { AfterViewInit, Component, OnInit } from '@angular/core';
import { Coordenada } from '../core/modelo/coordenada.class';

import * as L from 'leaflet';

// declare const google: any;

@Component({
  selector: 'app-principal',
  templateUrl: './principal.component.html',
  styleUrls: ['./principal.component.scss']
})
export class PrincipalComponent implements OnInit, AfterViewInit {

  lat = 20.5937;
  lng = 78.9629;

  // Arreglo de Puntos del Polígono
  pointList: Coordenada[] = [];

  drawingManager: any;
  selectedShape: any;
  selectedArea = 0;

  private map;

  constructor() { }

  ngOnInit() {
  }

  ngAfterViewInit() {
    // this.initMap();
  }

  private initMap(): void {
    this.map = L.map('map', {
      center: [39.8282, -98.5795],
      zoom: 3
    });
    const tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      minZoom: 3,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    tiles.addTo(this.map);
  }

  /*
    Con Leaflet, visualiza los datos como capas . El tipo de datos en el que piensa cuando imagina un mapa se llama "mosaicos".
    Deberá crear una nueva capa de mosaicos y agregarla al mapa.
    Para crear una nueva capa de teselas, primero debe pasar una URL del servidor de teselas.
    Hay muchos proveedores de servidores de mosaicos, pero este tutorial utilizará el servidor de mosaicos de OpenStreetMap .
  */


}
