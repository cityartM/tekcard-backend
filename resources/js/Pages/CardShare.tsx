import React, {PropsWithChildren} from "react";
import {Head, usePage} from "@inertiajs/react";
import useReviews from "@/Utils/Review";
import LandingLayout from "@/Layouts/LandingLayout";
import HeroSection from "@/Components/Home/HeroSection";
import FeaturesSection from "@/Components/Home/FeaturesSection";
import HeroStatsSection from "@/Components/Home/HeroStatsSection";
import FeaturesGridSection from "@/Components/Home/FeaturesGridSection";
import Background1 from "../../images/home/bg-reviews.webp";
import Background from "../../images/2-phones-rotated.png";

export default function Home({}: PropsWithChildren) {
  const props = usePage().props
  const locale = props.locale;
  const { reviews } = useReviews(locale as string);

  return (
    <LandingLayout>
      <Head title="Welcome" />

      shareCard

    </LandingLayout>
  );
}
