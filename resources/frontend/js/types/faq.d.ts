import React, {PropsWithChildren} from "react";

declare module '*.json' {
    const value: any;
    export default value;
}

export type FaqType = { number: number; question: string; answer: string };

export type FaqExpandButtonProps = PropsWithChildren & {faq: FaqType, isOpen: boolean, setIsOpen: React.Dispatch<React.SetStateAction<boolean>>}
export type FaqContentProps = PropsWithChildren & {faq: FaqType, isOpen: boolean}
export type FaqHeaderProps = PropsWithChildren & {faq: FaqType, isOpen: boolean, setIsOpen: React.Dispatch<React.SetStateAction<boolean>>}
