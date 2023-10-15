import { useEffect, useState } from 'react';
import reviewsData from '../../assets/reviews.json';
import {ReviewType} from "../types/review";

const fetchReviews = (locale: string) => {
    const reviews = reviewsData.find((item) => item.locale === locale);

    if (reviews) {
        return { reviews: reviews.reviews };
    } else {
        return { reviews: [] };
    }
};

const useReviews = (locale: string) => {
    const [reviews, setReviews] = useState<ReviewType[] | null>(null);

    useEffect(() => {
        const data = fetchReviews(locale);
        setReviews(data.reviews);
    }, [locale]);

    return { reviews };
};

export default useReviews;
