
export type ReviewType = {
    id: number;
    name: string;
    position: string;
    image: string;
    rating: number;
    content: string;
};

export type ReviewExpandButtonProps = {
    review: ReviewType;
    isOpen: boolean;
    setIsOpen: React.Dispatch<React.SetStateAction<boolean>>;
};

export type ReviewContentProps = {
    review: ReviewType;
    isOpen: boolean;
};
