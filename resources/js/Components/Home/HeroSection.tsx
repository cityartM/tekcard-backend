import React from "react";
import AppstoreImage from "../../../images/home/appstore1.png";
import PlaystoreImage from "../../../images/home/playstore1.png";
import HeroImage from "../../../images/home/hero.webp";

const __ = (key: string) => key;

const data = {
  title: __('Ready To Launch Your Online Digital Business Card App'),
  description: __('Tekcard is a free digital business card and contact manager app designed to help you grow your network.'),
  appstore: {
    url: '#',
    image: AppstoreImage,
  },
  playstore: {
    url: '#',
    image: PlaystoreImage,
  },
  hero: {
    image: HeroImage,
  }
}

const HeroSection: React.FC = () => {
  return (
    <div className="grid grid-cols-1 md:grid-cols-2">
      <div className="px-6 py-10 relative flex flex-col items-start justify-center">
        <h1 className="text-center md:text-start font-bold leading-[3rem] text-[2.5rem] ">
          <span className="text-[#2273AF]">{data.title} </span>
        </h1>
        <p className="mt-6 text-center md:text-start text-lg font-semibold leading-8 text-[#6B7280]">{data.description}</p>
        <div className="mt-10 mx-auto md:mx-0 grid grid-cols-2 gap-6">
          <a href={data.playstore.url} className="h-12 md:h-16">
            <img className="h-full w-full object-contain" src={data.playstore.image} alt="playstore" />
          </a>
          <a href={data.appstore.url} className="h-12 md:h-16">
            <img className="h-full w-full object-contain" src={data.appstore.image} alt="appstore" />
          </a>
        </div>
      </div>
      <div className="px-6 py-10 mx-auto max-w-xl">
        <div className="relative h-full flex justify-center">
          <img className="w-full object-contain" src={data.hero.image} alt="hero"/>
        </div>
      </div>
    </div>
  );
}

export default HeroSection;
