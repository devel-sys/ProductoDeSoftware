import { Component, OnInit } from '@angular/core';
import { Coordenada } from '../core/modelo/coordenada.class';

// declare const google: any;

@Component({
  selector: 'app-principal',
  templateUrl: './principal.component.html',
  styleUrls: ['./principal.component.scss']
})
export class PrincipalComponent implements OnInit {

  lat = 20.5937;
  lng = 78.9629;

  // Arreglo de Puntos del Polígono
  pointList: Coordenada[] = [];

  drawingManager: any;
  selectedShape: any;
  selectedArea = 0;

  constructor() {}

  ngOnInit() {
    this.setCurrentPosition();
  }

  private setCurrentPosition() {
    if ('geolocation' in navigator) {
      navigator.geolocation.getCurrentPosition((position) => {
        this.lat = position.coords.latitude;
        this.lng = position.coords.longitude;
      });
    }
  }

  // onMapReady(map) {
  //   this.initDrawingManager(map);
  // }

  // initDrawingManager = (map: any) => {
  //   const self = this;
  //   const options = {
  //     drawingControl: true,
  //     drawingControlOptions: {
  //       drawingModes: ['polygon'],
  //     },
  //     polygonOptions: {
  //       draggable: true,
  //       editable: true,
  //     },
  //     drawingMode: google.maps.drawing.OverlayType.POLYGON,
  //   };
  //   this.drawingManager = new google.maps.drawing.DrawingManager(options);
  //   this.drawingManager.setMap(map);
  //   google.maps.event.addListener(
  //     this.drawingManager,
  //     'overlaycomplete',
  //     (event) => {
  //       if (event.type === google.maps.drawing.OverlayType.POLYGON) {
  //         const paths = event.overlay.getPaths();
  //         for (let p = 0; p < paths.getLength(); p++) {
  //           google.maps.event.addListener(
  //             paths.getAt(p),
  //             'set_at',
  //             () => {
  //               if (!event.overlay.drag) {
  //                 self.updatePointList(event.overlay.getPath());
  //               }
  //             }
  //           );
  //           google.maps.event.addListener(
  //             paths.getAt(p),
  //             'insert_at',
  //             () => {
  //               self.updatePointList(event.overlay.getPath());
  //             }
  //           );
  //           google.maps.event.addListener(
  //             paths.getAt(p),
  //             'remove_at',
  //             () => {
  //               self.updatePointList(event.overlay.getPath());
  //             }
  //           );
  //         }
  //         self.updatePointList(event.overlay.getPath());
  //         this.selectedShape = event.overlay;
  //         this.selectedShape.type = event.type;
  //       }
  //       if (event.type !== google.maps.drawing.OverlayType.MARKER) {
  //         // Switch back to non-drawing mode after drawing a shape.
  //         self.drawingManager.setDrawingMode(null);
  //         // To hide:
  //         self.drawingManager.setOptions({
  //           drawingControl: false,
  //         });
  //       }
  //     }
  //   );
  // }


  // deleteSelectedShape() {
  //   if (this.selectedShape) {
  //     this.selectedShape.setMap(null);
  //     this.selectedArea = 0;
  //     this.pointList = [];
  //     // To show:
  //     this.drawingManager.setOptions({
  //       drawingControl: true,
  //     });
  //   }
  // }

  // updatePointList(path) {
  //   this.pointList = [];
  //   const len = path.getLength();
  //   for (let i = 0; i < len; i++) {
  //     this.pointList.push(
  //       path.getAt(i).toJSON()
  //     );
  //   }
  //   this.selectedArea = google.maps.geometry.spherical.computeArea(
  //     path
  //   );
  // }

}
