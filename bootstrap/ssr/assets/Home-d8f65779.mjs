import { jsxs, jsx } from "react/jsx-runtime";
import { usePage, Head } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-7366ebd6.mjs";
import { F as Faq } from "./Faq-b8d8b6c8.mjs";
import { u as useFaqs } from "./Faq-589e9e94.mjs";
import { useState, useEffect } from "react";
import "./ApplicationLogo-015a1322.mjs";
import "./NavLink-4a314f9d.mjs";
const reviewsData = [
  {
    locale: "en",
    reviews: [
      {
        id: 1,
        name: "Asmaa",
        position: "Designer",
        image: "test.png",
        rating: 5,
        content: "Our team was able to teach themselves Primchat in a day. It's like using a shared email inbox, just way more robust looking. Primchat was exactly what we were looking for."
      },
      {
        id: 2,
        name: "John",
        position: "Developer",
        image: "test2.png",
        rating: 4,
        content: "Primchat has been a great addition to our workflow. The user-friendly interface and robust features have made it easy for our team to communicate effectively."
      }
    ]
  },
  {
    locale: "ar",
    reviews: [
      {
        id: 1,
        name: "عبدالله",
        position: "مطور",
        image: "test.png",
        rating: 5,
        content: "لقد استفاد فريق العمل من Primchat بشكل كبير. واجهة المستخدم والميزات القوية ساعدت فريقنا على التواصل بفعالية."
      },
      {
        id: 2,
        name: "فاطمة",
        position: "مصممة",
        image: "test2.png",
        rating: 4,
        content: "تمثل Primchat إضافة رائعة لتدفق عملنا. واجهة المستخدم سهلة الاستخدام والميزات القوية جعلت الأمور سهلة لفريقنا للتواصل بفعالية."
      }
    ]
  },
  {
    locale: "tr",
    reviews: [
      {
        id: 1,
        name: "Ahmet",
        position: "Geliştirici",
        image: "test.png",
        rating: 5,
        content: "Takımımız Primchat'i bir günde öğrenebildi. Paylaşılan bir e-posta gelen kutusu kullanmak gibiydi, sadece çok daha sağlam görünüyordu. Primchat tam olarak aradığımız şeydi."
      },
      {
        id: 2,
        name: "Ayşe",
        position: "Tasarımcı",
        image: "test2.png",
        rating: 4,
        content: "Primchat iş akışımıza harika bir katkı oldu. Kullanıcı dostu arayüzü ve güçlü özellikler, ekibimizin etkili bir şekilde iletişim kurmasını kolaylaştırdı."
      }
    ]
  }
];
const fetchReviews = (locale) => {
  const reviews = reviewsData.find((item) => item.locale === locale);
  if (reviews) {
    return { reviews: reviews.reviews };
  } else {
    return { reviews: [] };
  }
};
const useReviews = (locale) => {
  const [reviews, setReviews] = useState(null);
  useEffect(() => {
    const data = fetchReviews(locale);
    setReviews(data.reviews);
  }, [locale]);
  return { reviews };
};
const useReviews$1 = useReviews;
function Home({}) {
  const locale = usePage().props.locale;
  useReviews$1(locale);
  return /* @__PURE__ */ jsxs(LandingLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsx(FaqsSection, {})
  ] });
}
const FaqsSection = () => {
  const locale = usePage().props.locale;
  const { faqs } = useFaqs(locale);
  return /* @__PURE__ */ jsxs("section", { className: "max-w-2xl mx-auto py-20", children: [
    /* @__PURE__ */ jsx("div", { className: "max-w-md mx-auto flex justify-center", children: /* @__PURE__ */ jsx("h2", { className: "text-center font-bold tracking-wide leading-[4.5rem] text-5xl text-sky-400", children: `Frequently Ask Questions (${locale})` }) }),
    /* @__PURE__ */ jsx("div", { className: "mt-12", children: faqs && /* @__PURE__ */ jsx(Faqs, { Faqs: faqs }) })
  ] });
};
const Faqs = ({ Faqs: Faqs2 }) => {
  return /* @__PURE__ */ jsx("div", { className: "flex flex-col space-y-10", children: Faqs2.map((faq) => /* @__PURE__ */ jsx(Faq, { Faq: faq }, faq.number)) });
};
export {
  Home as default
};
