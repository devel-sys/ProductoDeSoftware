import { Injectable } from '@angular/core';
import { Observable, Subject } from 'rxjs';
import { DialogClass } from '../../modelo/dialog.class';

@Injectable({
  providedIn: 'root'
})
export class GlobalErrorService {

  constructor() { }

  public errorSubject: Subject<DialogClass | any> = new Subject<DialogClass | any>();

  public openedDialogs: { [id: string]: boolean } = {};

  public accept(message: string, accept: () => void, cancel?: () => void) {
    // if (!this.isActive(message)) {
      this.createHash(message);
      this.errorSubject.next({
        message,
        icon: 'done',
        accept,
        cancel,
        afterClosed: () => this.deleteHash(message)
      });
    // }
  }

  public getErrorSubject(): Observable<DialogClass | any> {
    return this.errorSubject.asObservable();
  }

  private isActive(message: string) {
    return this.openedDialogs[this.getHash(message)] !== undefined;
  }

  private getHash(message: string) {
    return btoa(message);
  }

  private createHash(message: string) {
    this.openedDialogs[this.getHash(message)] = true;
    return this.getHash(message);
  }

  private deleteHash(message: string) {
    console.log(this.openedDialogs);
    delete this.openedDialogs[this.getHash(message)];
    console.log(this.openedDialogs);
  }
}
