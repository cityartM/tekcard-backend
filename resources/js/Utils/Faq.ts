import { useEffect, useState } from "react";
import faqData from '../../assets/faq.json'; // Import the reformatted JSON
import { FaqType } from "../types/faq";

const fetchFaqs = (locale: string) => {
    const faqs = faqData.find((item) => item.locale === locale);

    if (faqs) {
        return faqs.faqs;
    } else {
        return []; // Return an empty array if the locale is not found
    }
};

const useFaqs = (locale: string) => {
    const [faqs, setFaqs] = useState<FaqType[] | null>(null);

    useEffect(() => {
        const data = fetchFaqs(locale);
        setFaqs(data); // Set faqs inside the useEffect

        // If you want to log faqs, do it here, after setting the state
        console.log(data);
    }, [locale]);

    return { faqs };
};

export default useFaqs;

