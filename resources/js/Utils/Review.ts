import { useEffect, useState } from 'react';
import {ReviewType} from "@/types/review";

import reviewsData from '../../assets/reviews.json';

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

    console.log(reviews)

    useEffect(() => {
        const data = fetchReviews(locale);
        setReviews(data.reviews);
    }, [locale]);

    return { reviews };
};

export default useReviews;
