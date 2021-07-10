import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Subscription } from 'rxjs';
import { UsuarioInterface } from '../core/modelo/usuario.interface';
import { AuthService } from '../core/services/auth/auth.service';
import { StorageService } from '../core/services/storage/storage.service';

@Component({
    selector: 'app-navbar',
    templateUrl: './navbar.component.html',
    styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {

    public isCollapse = true;
    public sesionActiva = false;

    private usuarioSubscription: Subscription;

    public usuario: UsuarioInterface;

    constructor(
        private authService: AuthService,
        private storageService: StorageService,
        private router: Router
    ) { }

    ngOnInit() {
        this.validarSesion();
        this.setUsuario();
    }

    private validarSesion() {
        const usuario = this.storageService.getUsuario();
        console.log(usuario);
        if (usuario) {
            console.log(true);
            this.usuario = usuario;
            this.sesionActiva = true;
        } else {
            this.sesionActiva = false;
            console.log(false);
        }
    }

    private setUsuario() {
        this.usuarioSubscription = this.storageService.getUsuarioSubject().subscribe({
            next: (data: UsuarioInterface) => {
                console.log(data);
                if (data) {
                    this.usuario = data;
                    this.sesionActiva = true;
                } else {
                    this.sesionActiva = false;
                }
            },
            error: (error) => {
                console.log(error);
            },
        });
    }

    // Navbar: Toggle event Button
    toggleState() {
        const foo = this.isCollapse;
        this.isCollapse = foo === false ? true : false;
    }

    public onSelectMiPerfil() {
        this.router.navigate(['/usuario']);

    }

    onSelectSalir() {
        console.log(this.usuario.ses_token);
        this.authService.cerrarSesion(this.usuario.ses_token).subscribe({
            next: (data) => {
                console.log(data);
            },
            error: (error) => {
                console.log(error);
            }
        });
    }
}
