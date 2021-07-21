import { Component, OnInit } from '@angular/core';
import { MatDialog, MatDialogRef } from '@angular/material/dialog';
import { Subscription } from 'rxjs';
import { takeUntil } from 'rxjs/operators';
import { Campo } from 'src/app/core/modelo/campo.class';
import { UsuarioInterface } from 'src/app/core/modelo/usuario.interface';
import { CampoService } from 'src/app/core/services/campo/campo.service';
import { GlobalErrorService } from 'src/app/core/services/globalError/global-error.service';
import { StorageService } from 'src/app/core/services/storage/storage.service';
import { AddCampoComponent } from '../add-campo/add-campo.component';

@Component({
  selector: 'app-campos',
  templateUrl: './campos.component.html',
  styleUrls: ['./campos.component.scss']
})
export class CamposComponent implements OnInit {

  public usuario: UsuarioInterface;
  public campos: Campo[] = [];

  private dialogRef: MatDialogRef<AddCampoComponent>;

  public existenCampos = true;

  // Subscripciones
  private campoSubsccripcion: Subscription;

  constructor(
    private storageService: StorageService,
    private campoService: CampoService,
    private dialog: MatDialog,
    private errorService: GlobalErrorService
  ) { }

  ngOnInit() {
    this.setUsuario();
    this.getCampos();
  }

  private setUsuario() {
    this.usuario = this.storageService.getUsuario();
  }

  // private getCampos() {
  //   this.campos = [
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },
  //     {
  //       campo_id: 1,
  //       campo_descripcion: 'Pedrotti Gonzalo',
  //       campo_habilitado: true,
  //       campo_has: 120,
  //       campo_lat: -39.178676878,
  //       campo_long: 36.817716878,
  //       campo_nombre: 'Campo Norte Córdoba',
  //       campo_propietario_id: 1,
  //       campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
  //     },

  //   ];
  // }

  public onSelectNuevoCampo() {
    this.dialogRef = this.dialog.open(AddCampoComponent, {
      data: {},
      maxHeight: '95vh',
      height: '95vh',
      maxWidth: '95vh',
      width: '95vh',
      disableClose: false, // Cierre con ESC o click afuera
      // hasBackdrop: false,
      closeOnNavigation: true // Cerrar al navegar
    });
    this.dialogRef.afterClosed().subscribe((result) => {
      console.log(result);
    });
  }

  private getCampos() {
    this.campoService.getCampos(this.usuario.ses_token).subscribe({
      next: (campos) => {
        console.log(campos);
        // this.campos = campos;
        // this.existenCampos = this.campos.length > 0 ? true : false;
      },
      error: (error) => {
        console.log(error);
        this.errorService.accept('', () => {});
      }
    });
  }

}
