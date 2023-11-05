import { useEffect, useState } from "react";
import { FaqType } from "@/types/faq";

import faqData from '../../assets/faq.json'; // Import the reformatted JSON

const fetchFaqs = (locale: string) => {
    const faqs = faqData.find((item) => item.locale === locale);

    if (faqs) {
        return faqs.faqs;
    } else {
        return [];
    }
};
const useFaqs = (locale: string) => {
    const [faqs, setFaqs] = useState<FaqType[] | null>(null);

    useEffect(() => {
        const data = fetchFaqs(locale);
        setFaqs(data);
    }, [locale]);

    return { faqs };
};

export default useFaqs;

