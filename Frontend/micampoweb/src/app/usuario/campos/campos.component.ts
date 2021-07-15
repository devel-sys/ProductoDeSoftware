import { Component, OnInit } from '@angular/core';
import { Campo } from 'src/app/core/modelo/campo.class';
import { UsuarioInterface } from 'src/app/core/modelo/usuario.interface';
import { StorageService } from 'src/app/core/services/storage/storage.service';

@Component({
  selector: 'app-campos',
  templateUrl: './campos.component.html',
  styleUrls: ['./campos.component.scss']
})
export class CamposComponent implements OnInit {

  public usuario: UsuarioInterface;
  public campos: Campo[] = [];

  public existenCampos = false;

  constructor(
    private storageService: StorageService
  ) { }

  ngOnInit() {
    this.setUsuario();
    this.getCampos();
  }

  private setUsuario() {
    this.usuario = this.storageService.getUsuario();
    console.log(this.usuario);
  }

  private getCampos() {
    this.campos = [
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },
      {
        campo_id: 1,
        campo_descripcion: 'Pedrotti Gonzalo',
        campo_habilitado: true,
        campo_has: 120,
        campo_lat: -39.178676878,
        campo_long: 36.817716878,
        campo_nombre: 'Campo Norte Córdoba',
        campo_propietario_id: 1,
        campo_img: 'https://img2.freepng.es/20181201/koh/kisspng-vector-graphics-illustration-image-drawing-portabl-5c0303df7cc216.540241121543701471511.jpg'
      },

    ];
  }

}
