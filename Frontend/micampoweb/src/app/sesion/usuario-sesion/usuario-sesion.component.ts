import { Component, OnDestroy, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Subscription } from 'rxjs';
import { AuthService } from 'src/app/core/services/auth/auth.service';
import { GlobalErrorService } from 'src/app/core/services/globalError/global-error.service';
import { StorageService } from 'src/app/core/services/storage/storage.service';

@Component({
    selector: 'app-usuario-sesion',
    templateUrl: './usuario-sesion.component.html',
    styleUrls: ['./usuario-sesion.component.scss']
})
export class UsuarioSesionComponent implements OnInit, OnDestroy {

    // Formulario de Sesión
    public sesionGroup: FormGroup;

    // Subscripciones
    private sesionSubscripcion: Subscription;

    // Banderas
    public showSpinner = false;
    public errorSesion = false;

    constructor(
        private authService: AuthService,
        private storageService: StorageService,
        private globalErrorService: GlobalErrorService,
        private router: Router
    ) {
        this.sesionGroup = new FormGroup({
            usu_usuario: new FormControl('', Validators.required),
            usu_pass: new FormControl('', Validators.required)
        });
    }

    public ngOnInit() {
    }

    ngOnDestroy() {
        if (this.sesionSubscripcion) {
            this.sesionSubscripcion.unsubscribe();
        }
    }

    // Sesion: Validar Datos ingresados
    onSelectIngresar() {
        if (this.sesionGroup.valid) {
            this.iniciarSesion(this.sesionGroup.value.usu_usuario, this.sesionGroup.value.usu_pass);
        }
    }

    // tslint:disable-next-line: variable-name
    iniciarSesion(usu_usuario, usu_pass) {
        this.showSpinner = true;
        console.log(usu_usuario, usu_pass);
        this.sesionSubscripcion = this.authService.iniciarSesion(usu_usuario, usu_pass).subscribe(data => {
            console.log(data);
            if (data.estadoSesion && data.registroSesion) {
                this.showSpinner = false;
                this.storageService.setUsuario(data.usuarioSesion);
                this.router.navigate(['/usuario']);
            }
            if (!data.estadoSesion || !data.registroSesion) {
                this.showSpinner = false;
                this.errorSesion = true;
                this.mostrarAlerta();
            }
        }, error => {
            this.showSpinner = false;
            this.mostrarAlerta();
        });
    }

    private mostrarAlerta() {
        this.globalErrorService.accept('mensaje de prueba',
            () => {
                console.log('aceptado');
            },
            () => {
                console.log('cancelado');
            }
        );
    }

}
