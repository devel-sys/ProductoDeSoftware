export class DialogClass {
    message: string;
    icon?: string;
    accept?: () => void;
    cancel?: () => void;
    autoclose?: number;
    disableClose?: boolean;
    hasBackdrop?: boolean;
}
