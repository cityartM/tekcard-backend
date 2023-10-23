import React, { PropsWithChildren } from 'react';
import Header from "@/Layouts/Header";
import Footer from '@/Layouts/Footer';

export default function LandingLayout({ children }: PropsWithChildren) {
  return (
    <div className="">
      <Header />

      <main>
        {children}
      </main>

      <Footer />
    </div>
  );
}


