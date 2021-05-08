import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { AuthService } from 'src/app/services/auth.service';
import { StorageService } from 'src/app/services/storage.service';

@Component({
  selector: 'app-usuario-sesion',
  templateUrl: './usuario-sesion.component.html',
  styleUrls: ['./usuario-sesion.component.scss']
})
export class UsuarioSesionComponent implements OnInit {

  constructor(
    private authService: AuthService,
    private storageService: StorageService
  ) { }

  ngOnInit() {
  }

  public sesionGroup = new FormGroup({
    usu_usuario: new FormControl('', Validators.required),
    usu_pass: new FormControl('', Validators.required)
  })

  public showSpinner: boolean = false;

  /********************SESION***********************/

  //Sesion: Validar Datos ingresados
  onSelectIngresar() { 
    console.log(this.sesionGroup)
    if(this.sesionGroup.valid) {
      this.iniciarSesion(this.sesionGroup.value.usu_usuario, this.sesionGroup.value.usu_pass);
    }
  }

  //Sesion: Iniciar Sesión
  iniciarSesion(usu_usuario, usu_pass) {
    this.showSpinner = true;
    console.log(usu_usuario, usu_pass);
    this.authService.iniciarSesion(usu_usuario, usu_pass).subscribe(data => {
      console.log(data);
      if(data.estadoSesion && data.registroSesion) {
        this.storageService.setUser(data.usuarioSesion);
      }
      this.showSpinner = false;

    }, error => {
      this.showSpinner = false;
    })
  }

}
